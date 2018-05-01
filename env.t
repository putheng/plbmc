APP_ENV=local
APP_KEY=base64:M5r1UKTEMjj272Zd3ep5wcwvwGLVMNV29igtLge8vhw=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

heroku config:add DB_CONNECTION=pgsql
heroku config:add DB_HOST=ec2-174-129-41-64.compute-1.amazonaws.com
heroku config:add DB_PORT=5432
heroku config:add DB_DATABASE=dck1q6iim51jdc
heroku config:add DB_USERNAME=htwwfswzpsmfdo
heroku config:add DB_PASSWORD=b421e8f0b79029a10c3376ee0daf3babb8f5e82486790f6ea1d9d19887e5725c
heroku config:add DATABASE_URL=postgres://putheng:ph012916956@police.clp63uv2wluu.us-east-1.rds.amazonaws.com/police_bmc?sslrootcert=config/rds-combined-ca-bundle.pem

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=

repositoryformatversion = 0
filemode = true
bare = false
logallrefupdates = true
[remote "heroku"]
url = https://git.heroku.com/gentle-scrubland-58707.git
fetch = +refs/heads/*:refs/remotes/heroku/*