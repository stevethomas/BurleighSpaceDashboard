# Burleigh Space Dashboard

This repo contains the source code for Burleigh Space Dashboard, a bespoke dashboard running a Raspberry Pi 3 / HD TV.

Project forked from [spatie](https://github.com/spatie/dashboard.spatie.be). Awesome project - direct all kudos and postcards to them!

## Setup Notes
- Ref: https://murze.be/2016/06/building-dashboard-using-laravel-vue/
- Run bash bin/setup.sh
- Add credentials for Pusher

### Calendar
- https://console.developers.google.com/apis/
- https://murze.be/2016/05/how-to-setup-and-use-the-google-calendar-api/
- Create a new Service Account Key credential for google-api, JSON
- Copy JSON file to storage/app/laravel-google-calendar/client_secret.json
- Retrieve calendar ID from Calendar Details tab at https://calendar.google.com

### Last.fm
- https://secure.last.fm/api/authentication
- add API key to .env
- open spotify setup last.fm in settings
- (note last.fm auth does not seem to be required)

### Temperature (inside)
- Add device API endpoint in .env
- Add user API key in .env

### TV
- Edit /boot/config.txt add:
````
# uncomment disable_overscan=1
disable_overscan=1
````
- Update ~/.config/lxsession/LXDE-pi/autostart as per bin/autostart
- in GUI > Preferences > Screensaver, disable screen saver 

## Components

Custom components for Burleigh Space:
 - refactored Outside weather component showing temperature and 3 day forecast
 - News component pulling headlines from ABC Australia
 - Inside temperature component pulling data from [Coding Labs Temperature Monitor](https://codinglabs.io).


In addition to the Spatie components:

- Team calendar via [Google Calendar](https://google.com/calendar)
- Music currently playing via [Last.fm](https://last.fm)
- Clock/date
- Team todo's via GitHub files
- [Packagist](https://packagist.org/) stars and total downloads
- Rain forecast (for the bikers amongst us) via [buienradar.nl](http://buienradar.nl)
- Internet up/down via WebSockets

## Support
This dashboard is tailormade for Burleigh Space offices in Burleigh Heads, Australia. See the setup notes above and the original forked repo for a starting point. 

## License
This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
