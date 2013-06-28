This tool was created to make cohort analysis and to calculate retention rates based on PayPal logs.

To run this tool from your own server:
--------------------------------------

1) Clone the files in a subfolder.

2) Make sure that the "Upload" directory has enough permissions to allow file uploading. Uploaded logs will reside temporarily there.

3) Make sure the size file you are trying to upload is below the maximum allowed size by PHP.

To view or modify this limit check your php.ini file:

; Maximum allowed size for uploaded files.
upload_max_filesize = 5M



How to obtain a PayPal log:
---------------------------

Login to PayPal.
Click on History -> Download History.
On the resulting page, select date range of the transactions you want to download.
Make sure to select "Comma Delimited, All Activity" as File Type.
Make sure to check "Include Shopping Cart details" option.
Click on Download History button.
PayPal will start generating the CSV file. Once the file is ready, you will receive a notification via email.
Do the following after the file is generated.
Come back to History -> Download History.
Come to "Download Recent History Logs" page.
Select the log file.
Click on "Download Log".
A CSV file will be downloaded.