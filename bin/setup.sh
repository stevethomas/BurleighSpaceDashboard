#! /usr/bin/env bash

###############################################################
# Helper script to run after initial git clone on dev machine #
###############################################################

# Create a symbolic link to Launch Agent in user launch agents directory
echo "Configuring launch agents..."

ln -s ${PWD}/bin/com.codinglabs.dashboard.plist  ~/Library/LaunchAgents/com.codinglabs.dashboard.plist
launchctl load ~/Library/LaunchAgents/com.codinglabs.dashboard.plist

echo "Installation complete!"

echo "Important: Open bin/com.codinglabs.dashboard.plist and update path to artisan"
