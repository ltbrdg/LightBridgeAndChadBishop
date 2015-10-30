# config valid only for Capistrano 3.1
lock '3.2.1'

set :application, 'ChadBishop'
set :repo_url, 'git@github.com:ltbrdg/ChadBishop.git'
# set :linked_files, %w{_lib/config.database.php}
# set :linked_dirs, %w{upload/college-form-resumes}
set :linked_dirs, %w{vendor}

# set :linked_dirs, %w{share_pages}
# set :linked_files, %w{public_lb/js/showcase-data.json}
# set :linked_files, %w{public_cb/js/showcase-data.json}

set :ssh_options, {
  forward_agent: true
}

# namespace :deploy do
#   task :restart do
#     on roles(:web) do
#       execute "sudo service apache2 reload"
#     end
#   end
# end

#after :deploy, "deploy:restart"