# Description
A small project to compare a game server's version to the actual game version.

# App.php
`GET` Information
* `appid` - The Steam application ID.

# Server.php
`GET` Information
* `appid` - The Game Server's Steam application ID.
* `ip` - The game server's IP address.
* `port` - The game server's port.

**You must configure a Steam Web API key in the server.php file.**