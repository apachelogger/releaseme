#--
# Copyright (C) 2007-2014 Harald Sitter <apachelogger@ubuntu.com>
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of
# the License or (at your option) version 3 or any later version
# accepted by the membership of KDE e.V. (or its successor approved
# by the membership of KDE e.V.), which shall act as a proxy
# defined in Section 14 of version 3 of the license.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#++

require 'fileutils'

require_relative 'cmakeeditor'
require_relative 'source'
require_relative 'svn'

class DocumentationL10n < Source
    # FIXME: DUPS EVERYWHERE!
    # The VCS to use to obtain the l10n sources
    attr :vcs, false
    # The type of the release (stable,trunk)
    attr :type, false
    # The application's module (used to build the checkout path - e.g. extragear)
    attr :module, false
    # The application's section within the module (e.g. multimedia for amarok)
    # Can be empty
    attr :section, false

    # Obtained and valid languages
    attr :languages, false
    # Found templates
    attr :templates, false

    # Type identifiers
    TRUNK  = :trunk
    STABLE = :stable


    attr :project_name, false

    def initialize(type, project_name, module_, section = "", vcs = nil)
        if vcs.nil?
            @vcs = Svn.new()
        else
            @vcs = vcs
        end

        if type.nil?
            raise "Type cannot be nil"
        else
            @type = type
        end

        if module_.nil?
            raise "Module cannot be nil"
        else
            @module = module_
        end

        if section.nil?
            raise "Section cannot be nil, but an empty string"
        else
            @section = section
        end

        @languages = Array.new
        @templates = Array.new

        @project_name = project_name

        initRepoUrl("svn://anonsvn.kde.org/home/kde/")
    end

    # FIXME: code copy
    def initRepoUrl(baseUrl)
        puts "code copy!!!"

        repoUrl = baseUrl
        repoUrl.concat("/") if not repoUrl.end_with?("/")
        if type == TRUNK
            repoUrl.concat("trunk/")
        else
            repoUrl.concat("branches/stable/")
        end
        repoUrl.concat("/l10n-kf5/")

        @vcs.repository = repoUrl
    end

    def vcs_l10n_path(lang)
        return "#{lang}/docs/#{@module}-#{@section}/#{@project_name}"
    end

    def get(sourceDirectory)
        previous_pwd = Dir.pwd
        dir = "#{Dir.pwd}/#{sourceDirectory}/doc"
        temp_dir = "#{Dir.pwd}/#{sourceDirectory}/l10n"
        Dir.mkdir(dir) unless File.exists?(dir)

        availableLanguages = vcs.cat("subdirs").split("\n")
        docs = Array.new

        # On git a layout doc/{file,file,file} may appear, in this case we move stuff
        # to en_US.
        # A more complicated case would be doc/{dir,dir}/{file,file} which can happen for
        # multisource repos such as plasma-workspace.
        # FIXME: multi-source documentation is not tested
        #        need new data set with something like
        #        doc/foo/index.docbook
        #        doc/bar/index.docbook
        #        doc/foobar/meow.txt
        unless Dir.glob("#{dir}/**/index.docbook").empty? or File.exists?("#{dir}/en_US") then
            files = Dir.glob("#{dir}/*").uniq
            p files
            Dir.mkdir("#{dir}/en_US")
            FileUtils.mv(files, "#{dir}/en_US")
            docs << "en_US" # We placed an en_US, make sure it is in the docs list.
        end

        # No documentation avilable -> leave me alone
        if not File.exists?("#{dir}/en_US") then
            puts("There is no en_US documentation :(")
            puts("Leave me alone :(")
            return
        end

        CMakeEditor::create_language_specific_doc_lists!("#{dir}/en_US", "en_US", project_name)
        for language in availableLanguages
            language.chomp!
            next if language == "x-test"

            puts "Downloading #{language} documentation translations for #{sourceDirectory}"

            FileUtils.rm_rf(temp_dir)
            vcs.get(temp_dir, vcs_l10n_path(language))
            unless FileTest.exists?("#{temp_dir}/index.docbook") # without index the translation is not worth butter
                puts '  no valid documentation translation found, skipping.'
                next
            end

            dest_dir = "#{dir}/#{language}"
            puts("Copying #{language}'s #{@project_name} documentation over...")
            FileUtils.mv(temp_dir, dest_dir)

            CMakeEditor::create_language_specific_doc_lists!("#{dir}/#{language}", language, project_name)

            # add to SVN in case we are tagging
            # FIXME: direct svn access
            `svn add #{dir}/#{language}/CMakeLists.txt`
            docs += [language]

            puts( "done.\n" )
        end

        if not docs.empty?
            CMakeEditor::create_doc_meta_lists!(dir)
            CMakeEditor::append_optional_add_subdirectory!(sourceDirectory, 'doc')
        else
            puts "no docs found :'<"
            FileUtils::rm_rf(dir)
        end

        FileUtils::rm_rf(temp_dir)
    ensure
        Dir.chdir(previous_pwd)
    end
end
