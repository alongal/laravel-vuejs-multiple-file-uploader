# LIVE
rsync -vzcrSLh --exclude-from "rsync.exclude.list.txt" -rave "ssh -i /Users/alongal/AWS/chawkinskey.pem" ./ ubuntu@receiptupload.loyaltyplatform.net:/www/laravel-vuejs-multiple-file-uploader
ssh -i /Users/alongal/AWS/chawkinskey.pem ubuntu@receiptupload.loyaltyplatform.net "cd /www/laravel-vuejs-multiple-file-uploader; composer dump-autoload"
ssh -i /Users/alongal/AWS/chawkinskey.pem ubuntu@receiptupload.loyaltyplatform.net "cd /www/laravel-vuejs-multiple-file-uploader; php artisan cache:clear"
ssh -i /Users/alongal/AWS/chawkinskey.pem ubuntu@receiptupload.loyaltyplatform.net "cd /www/laravel-vuejs-multiple-file-uploader; php artisan migrate"

