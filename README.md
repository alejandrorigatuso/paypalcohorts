This tool was created to perform a Cohort Analysis of your sales and to calculate Retention Rates through your PayPal data.

This article was created for the Toptal Engineering Blog. There's a full explanation there, I recommend you to check that article.

http://toptal.com/blog

If you have any doubt, you can contact me at alejandro@postcron.com

I hope you find it useful! 


How to use this tool
--------------------

1) Install the code on your server (just unzip or clone the files on a subfolder, see the comments below).

1) Download the PayPal log (see the instructions/comments below).

2) Run the code and upload the PayPal log.

3) The output of this tool is:

    a) Short term retention rate.
    b) Long term retention rate.
    c) A graph with the Cohort Analysis of the PayPal sales.


Note on how do I calculate Retention
------------------------------------

Some people calculate Retentions comparing the number of users relative to the first month; I prefer to calculate retention rates based on the previous month.

For instance, an 80% retention rate means that 80% of the customers that were present on the previous month, are still present.

Short term retention rates are related to the retention during the first month.

Long term retention rates ignores the first month retention (usually, long term retention is higher than short term retention).

Again, I recommend you to read the article at Toptal's Engineering Blog (http://toptal.com/blog).


To run this tool from your own server
-------------------------------------

1) Clone the files in a subfolder.

2) Make sure that the "Upload" directory has enough permissions to allow file uploading. Uploaded logs will reside temporarily there.

3) Make sure the size file you are trying to upload is below the maximum allowed size by PHP.

To view or modify this limit check your php.ini file:

; Maximum allowed size for uploaded files.
upload_max_filesize = 5M



How to obtain a PayPal log:
---------------------------

1) Login to PayPal.

2) Click on History -> Download History.

3) On the resulting page, select date range of the transactions you want to download.

4) Make sure to select "Comma Delimited, All Activity" as File Type.

5) Make sure to check "Include Shopping Cart details" option.

6) Click on Download History button.

7) PayPal will start generating the CSV file. Once the file is ready, you will receive a notification via email.

8) Do the following after the file is generated.

9) Come back to History -> Download History.

10) Come to "Download Recent History Logs" page.

11) Select the log file.

12) Click on "Download Log".

13) A CSV file will be downloaded.
