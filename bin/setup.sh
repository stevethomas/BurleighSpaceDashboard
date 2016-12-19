#! /usr/bin/env bash

###############################################################
# Helper script to run after initial git clone on dev machine #
###############################################################

# set app key
php artisan key:generate

# creating database
echo "Configuring database with basic auth user..."
touch database/database.sqlite
php artisan migrate
php artisan db:seed
gulp

# configure launch agent / cron job
if [[ "$OSTYPE" == "darwin"* ]]; then
    # Mac OSX
    echo "Configuring launch agents..."
    ln -s ${PWD}/bin/com.codinglabs.dashboard.plist  ~/Library/LaunchAgents/com.codinglabs.dashboard.plist
    launchctl load ~/Library/LaunchAgents/com.codinglabs.dashboard.plist
    echo "Important: Open bin/com.codinglabs.dashboard.plist and update path to artisan"
else
    # Linux
    echo "Configuring cron jobs..."
    sudo cp ${PWD}/bin/burleighspace /etc/cron.d
fi

echo "Installation complete!"
