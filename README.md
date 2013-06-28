This tool was created to perform Cohort Analysis and calculate Retention Rates based on PayPal logs. It is made to accompany a post I wrote for the <a href="http://toptal.com/blog">Toptal Engineering Blog</a>--I recommend you check out the <a href="http://www.toptal.com/business/growing-growth-perform-your-own-cohort-analysis">article</a>!

If you have any questions, you can contact me at <a href="mailto:alejandro@postcron.com">alejandro@postcron.com</a>. I hope you find it useful!


Usage
--------------------

1) Install the code on your server (just unzip or clone the files in a subfolder (see the comments below)).

1) Download your PayPal logs (see the instructions/comments below).

2) Run the code and upload said PayPal logs.

3) View, as output:
    a) Your short-term retention rate.
    b) Your long-term retention rate.
    c) A graph displaying Cohort Analysis of your PayPal sales.


How Do I Calculate Retention?
------------------------------------

Some people calculate retention by comparing the number of users at a given month relative to the first month that these users joined the service; I prefer to calculate retention rates based on the previous month.

For instance, an 80% retention rate means that 80% of the customers that were present on the previous month are still present.

Short-term retention rates are related to the retention during the first month.

Long-term retention rates ignore the first month retention (usually, long-term retention is higher than short-term retention).

Again, I recommend that you read the <a href="http://www.toptal.com/business/growing-growth-perform-your-own-cohort-analysis">article</a> on the <a href="http://toptal.com/blog">Toptal Engineering Blog</a>.


To Run This Tool on Your Own Server
-------------------------------------

1) Clone the files in a subfolder.

2) Make sure that the "Upload" directory has enough permissions to allow file uploading. Uploaded logs will reside there temporarily.

3) Make sure the size file you are trying to upload is below the maximum allowed size by PHP.

To view or modify this limit check your php.ini file:

; Maximum allowed size for uploaded files.
upload_max_filesize = 5M



How to Obtain a PayPal log:
---------------------------

1) Login to PayPal.

2) Click on History -> Download History.

3) On the resulting page, select the date range of the transactions you want to download.

4) Make sure to select "Comma Delimited, All Activity" as 'File Type'.

5) Make sure to check the "Include Shopping Cart Details" option.

6) Click on 'Download History'.

7) PayPal will start generating the CSV file. Once the file is ready, you will receive a notification via email. Wait for the notification email.

8) Come back to History -> Download History.

9) Come to "Download Recent History Logs" page.

10) Select the log file.

11) Click on "Download Log".

12) A CSV file will be downloaded.