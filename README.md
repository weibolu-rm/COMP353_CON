# COMP353_CON
Condo-association Online Network System -- CON

|Name|ID|Github|Email|
|---|---|---|---|
|Robert Michaud|40058095|weibolu-rm|r_ichaud@encs.concordia.ca|
|Elizabeth Shraffenberger|40025805|EASchraffenberger|e_schraf@encs.concordia.ca|
|Shurid Biswas|40024592|shuridbiswas|s_isw@encs.concordia.ca|

# Installation

TLDR at the end of this section if you know what you are doing.

To install this system on a remote server you would need to have access to the private git repository. (Actually we’ll make the repo public on the due date.) Assuming that is the case, the next step is to set up an SSH key to have direct access to the latest changes and not have to re-enter your sensitive credentials every time. Detailed instructions on this will be given afterwards. For the purposes of this demonstration, it is assumed that the user is deploying to the Concordia ENCS servers. Additionally, we will not explain how to get access to a terminal.


## Create an SSH connection
To create an SSH tunnel to the Concordia ENCS servers with access to com353’s MySQL databases on port 3306, use

`ssh -L 3306:eac353.encs.concordia.ca:3306 a_user@login.encs.concordia.ca`

Where a_user is your net name. Then, log in using your ENCS password. For more information see the AITS support section on GCS Linux Server [1]

##Generating an RSA Key
After successfully creating an SSH connection, you should generate an RSA key for your GitHub account (or skip this part if you want to use HTTPS).

While still connected to the ENCS servers, use

`ssh-keygen -t ed25519 -C "your_email@example.com"`

You will then have the options to change the directory and enter a secure passphrase. If you wish to keep the default settings, press ENTER a few times.
Since we’re on Concordia’s servers, the SSH agent should already be running. Now add this key with 

`ssh-add ~/.ssh/id_ed25519` 

Note that if you entered a different directory or have a different name for your key, replace them accordingly. [2] 

12.1.3 Adding the RSA key to your GitHub account
Your new key’s (default) location is ~/.ssh/id_ed25519.pub. Now you only need to add it to your GitHub account. Get the key’s content with

`cat ~/.ssh/id_ed25519.pub`

Now copy it according to your terminal’s keybinds (Ctrl+shift+c in my case). Go to GitHub > Settings > SSH and GPG keys > New SSH key and add your new RSA key. [3]

## Clone the repository
Now you can navigate to your web-server’s location, in this case that is:

`cd /www/groups/e/<your group>`

Clone the repo

`git clone git@github.com:weibolu-rm/COMP353_CON.git <consys (optional name)>`
    
Check file permissions with `ls -la` and make sure consys has permissions drwxr-sr-x. If not, use `chmod -R 755 consys/` 

cd into consys `cd consys`, subdirectories should have drwxr-sr-x permissions and files 
-rwxrwx---. 

This is important. Although folders should have the mentioned permissions, uploads/ needs special permissions to let people upload images. Use 

`chmod 777 uploads/`


## Create a connection to MySQL and populate the Database
Almost done. Next step is to create your configuration file for your database. Use your favorite editor to create a file `config.ini` in consys/includes/config.ini.

Enter your database information
```
;inside config.ini
[Database]
serverName = yourServerName
dbUsername = yourDBusername
dbPassword = yourDBpassword
dbName - yourDBname
```

Next, connect to MySQL
`mysql -h eac353.encs.concordia.ca -u <yourDBusername> -p <yourDBname>`
`Enter password: yourDBpassword`

Add the initial tables and default admin:
`source /www/groups/e/<your group>/consys/db/consys.sql`

Installation Complete. If you wish to populate the Database with dummy data:
`source /www/groups/e/<your group>/consys/db/consys_populate.sql`


# TLDR FOR EXPERIENCED USERS
SSH into desired remote server, navigate to web-server directory. Clone the Git repo, make sure folders/files have permission 755 except uploads/ which needs permission level 777 to let people upload images. Create config.ini in consys/includes/config.ini and enter data mentioned above to connect to your MySQL database.

With MySQL, source consys/db/consys.sql and optionally consys/db/consys_populate.sql.

# First time setup
The default administrator user has credentials admin/ admin. Log is as that user and modify the default credentials upon being prompted to do so. Afterwards, one can go to the Admin dashboard and add new members, change existing members, create announcements, view posts, etc.

You can now start using CONSYS.

