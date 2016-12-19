#! /usr/bin/env bash

###############################################################
# Helper script to run after initial git clone on dev machine #
###############################################################

composer install
php artisan key:generate
npm install
gulp

# configure launch agent / cron job
if [[ "$OSTYPE" == "darwin"* ]]; then
    # Mac OSX
    echo "Configuring launch agents..."
    ln -s ${PWD}/bin/com.codinglabs.dashboard.plist  ~/Library/LaunchAgents/com.codinglabs.dashboard.plist
    launchctl load ~/Library/LaunchAgents/com.codinglabs.dashboard.plist
    echo "Important: Open bin/com.codinglabs.dashboard.plist and update path to artisan"
fi

echo "Installation complete!"
