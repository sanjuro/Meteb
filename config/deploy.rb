set :application, "ebannuities"
set :domain,      "#{application}.co.za"
set :deploy_to,   "/usr/share/#{domain}"

set :repository,  "git@github.com:sanjuro/Meteb.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, `subversion` or `none`

role :web,        "vm02.osilab.net"                         # Your HTTP server, Apache/etc
role :app,        "vm02.osilab.net"                         # This may be the same as your `Web` server
role :db,         "vm02.osilab.net", :primary => true       # This is where Rails migrations will run

set  :keep_releases,  3

ssh_options[:user] = 'fubar'
# ssh_options[:keys] = %w(~/.ssh/id_dsa)
  
# ssh_options[:keys] =  %w(/home/bitnami/id_rsa)
  
set :user, "fubar"  # The server's user for deploys

set :branch, "master"
# set :branch, "edge"  

# set :use_sudo, true
set :sudo, "sudo -i"
  
namespace(:customs) do
  task :symlink, :roles => :app do
    run <<-CMD
      ln -s /usr/share/ebannuities.co.za/shared/MetebQuote.class.php #{release_path}/lib/
      # ln -s /usr/share/ebannuities.co.za/shared/config/databases.yml /usr/share/ebannuities.co.za/current/config/ 
    CMD
  end
end

after "deploy:symlink","customs:symlink"