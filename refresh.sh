#!/bin/bash

printf "\n###################################"
printf "\n# Running database refresh"
printf "\n################################### \n"

printf "\n# Maintence Mode \n"

bin/cake Setup.MaintenanceMode activate

printf "\n# Truncate \n"

bin/cake truncate_database

printf "\n# Seeding Database \n"

bin/cake migrations seed -p Sakila

printf "\n# Live Mode \n"

bin/cake Setup.MaintenanceMode deactivate

printf "\n# Running Swagger Bake \n"

bin/cake swagger bake
