#!/bin/sh

# EZCAST EZrecorder
#
# Copyright (C) 2014 Université libre de Bruxelles
#
# Written by Michel Jansens <mjansens@ulb.ac.be>
# 	     Arnaud Wijns <awijns@ulb.ac.be>
#            Antoine Dewilde
# UI Design by Julien Di Pietrantonio
#
# This software is free software; you can redistribute it and/or
# modify it under the terms of the GNU Lesser General Public
# License as published by the Free Software Foundation; either
# version 3 of the License, or (at your option) any later version.
#
# This software is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
# Lesser General Public License for more details.
#
# You should have received a copy of the GNU Lesser General Public
# License along with this software; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

cd $(dirname $0)
chown !USER *
chgrp !WEB_USER *
chown -R !WEB_USER ./var
chmod +a "!USER allow list,add_file,search,add_subdirectory,delete_child,file_inherit,directory_inherit" ./var
chmod +a "!WEB_USER allow list,add_file,search,add_subdirectory,delete_child,file_inherit,directory_inherit" ./var
touch ./var/status
chmod +a "!USER allow read,write,execute,append" ./var/status
chmod +a "!WEB_USER allow read,write,execute,append" ./var/status

chmod +a "!WEB_USER allow list,add_file,search,add_subdirectory,delete_child,file_inherit,directory_inherit" ./etc