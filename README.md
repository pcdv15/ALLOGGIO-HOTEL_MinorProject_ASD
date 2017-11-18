ALLOGGIO HOTEL ONLINE RESERVATION SYSTEM
======

***Alloggio***, is the Italian word for accommodation. Thus, our main target is to provide the people who seek a place to rest an accommodating experience. Starting with a button click.

Group Members
-----

+ Paul Chester Villanueva

+ Theona Aton

+ Dionne Evony Diola

+ Fritz Xhyro Getigan

-----
Content Analysis
- update reservation
- make new reservation
- input personal info
- manage user accounts
- confirm reserve order

-----
Configuration Analysis
- Windows 7 or later operating system
- Google Chrome required internet browser
- WAMP server installed
- Basic installation knowledge

-----
How to install Alloggio Hotel Online Reservation 2017:

Note: For the software to be working properly, you should install WampServer. You can download the latest version in here: http://www.wampserver.com/en/#download-wrapper

01. Open the downloaded file and click Run to start the installation process.

![](https://i.imgur.com/BobsH9V.png "")

02. A window will pop up. Just click Next and when you reach the License Agreement. Check the 'I accept the agreement' before you click Next until you will see the Ready to Install screen. Simply click Install and the WanpServer will begin extracting files to your computer.

![](https://i.imgur.com/smeFHZO.png "")

03. Once the files are extracted, you will be asked to select a default browser. Just Open the .exe of the browser of your choice. There will be another window that would pop up, just click Allow Access in order to finish the Installation process.

![](https://i.imgur.com/UYpVoK3.png "")

04. Once the progress bar is completely green, the PHP Mail Parameters screen will appear. Leave the SMTP server as localhost, and change the email address to one of your choosing. Click Next to continue.

![](https://i.imgur.com/SSaLl3i.png "")

05. The Installation Complete screen will now appear. Check the Launch WampServer Now box, then click Finish to complete the installation.

![](https://i.imgur.com/zN6LoLf.png "")

Now that you finish the first step. Let's proceed to the next step where you should install the online reservation software.

01. Left click the WAMP icon on the system tray and click MySql > MySql Console.

![](https://i.imgur.com/kPXA5Bl.png "")

02. Click enter in console and type the following GRANT ALL PRIVILEGES ON *.* TO 'alloggio'@'localhost' IDENTIFIED BY '123456';.

![](https://i.imgur.com/DhVmEpr.png "")

03. Download this repository.

![](https://i.imgur.com/N8aXfXx.png "")

04. Unzip the downloaded repository in any folder. In this case, we extracted the ZIP file in Desktop.

![](https://i.imgur.com/DOrWJHZ.png "")

05. Copy and paste the extracted folder to the wwwdirectory of the WAMP.

![](https://i.imgur.com/bvv9HLT.png "")

06. Go to Google Chrome browser and type localhost in the url bar and click enter.

![](https://i.imgur.com/MlXQMHg.png "")

07. Under Tools, click phpmyadmin and log-in to the phpmyadmin with username: alloggio and password: 123456.

![](https://i.imgur.com/8QXWaGq.png "")

08. In the homepage of phpmyadmin, create new database named alloggio.

![](https://i.imgur.com/6XnJz1h.png "")

09. In allogio database, import the sql file found in the sql folder on the extracted folder and click Go.

![](https://i.imgur.com/znzD73Y.png "")

10. In the Google Chrome, type the following in the url bar: http://localhost/alloggio-hotel_minorproject_asd-master/

![](https://i.imgur.com/j5LCstB.png "")

11. In this file directory, click public and the web app should be working.

![](https://i.imgur.com/3pqIuG1.png "")










