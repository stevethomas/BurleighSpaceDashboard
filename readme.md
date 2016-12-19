# dashboard.spatie.be

This repo contains the source code of https://dashboard.spatie.be

## Setup Notes
- Ref: https://murze.be/2016/06/building-dashboard-using-laravel-vue/
- Run bash bin/setup.sh
- Add credentials for Pusher

### Calendar
- https://console.developers.google.com/apis/
- https://murze.be/2016/05/how-to-setup-and-use-the-google-calendar-api/
- Create a new Service Account Key credential for google-api, JSON
- Copy JSON file to storage/app/laravel-google-calendar/client_secret.json

### Last.fm
- https://secure.last.fm/api/authentication
- add API key to .env
- open spotify setup last.fm in settings

## Example

<img style="max-width:100%; height: auto" src="http://spatie.github.io/dashboard.spatie.be/images/screenshot.png">

Our configured dashboard has following tiles:

- Team calendar via [Google Calendar](https://google.com/calendar)
- Music currently playing via [Last.fm](https://last.fm)
- Clock/date
- Team todo's via GitHub files
- [Packagist](https://packagist.org/) stars and total downloads
- Rain forecast (for the bikers amongst us) via [buienradar.nl](http://buienradar.nl)
- Internet up/down via WebSockets

## Postcardware

If you are using our dashboard, please send us a postcard from your hometown.

Our address is: Spatie, Samberstraat 69D, 2060 Antwerp, Belgium.

The best postcards will get published on the open source page on our website.

## Support
This dashboard is tailormade this be displayed on the wall mounted tv in our office. We do not follow semver for this project and do not provide support whatsoever. However if you're a bit familiar with Laravel and Vue you should easily find your way.

For more details on the project, read our articles about the [setup and components](https://murze.be/2016/06/building-dashboard-using-laravel-vue/) or the [custom grid design](https://murze.be/2016/06/grid-layout-dashboard/).

## License

This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
