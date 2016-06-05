server '107.170.202.132', user: 'deploy', roles: %w{web app db}

# set :ssh_options, {
#   port: 2229
# }
set :tmp_dir, '/home/deploy/tmp'
set :branch, 'master'
set :deploy_to, '/home/deploy/cap_chadbishop_ltbrdg'
set :keep_releases, 3

# set :composer_working_dir, '/home/deploy/ltbrdg_cap/current' #-> { fetch(:release_path) }

# Add the following to deploy.rb to manage the installation of composer during deployment (composer.phar is install in the shared path).
SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"

namespace :deploy do
  after :starting, 'composer:install_executable'
end