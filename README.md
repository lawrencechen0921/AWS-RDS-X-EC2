# AWS-RDS-X-EC2


Traditional methods of deploying servers and configuring security are complex and often involve multiple teams and long delays. 
Fortunately, it is quick and easy to deploy secure infrastructure in the cloud.




In this lab you will:
1.Launch a database using Amazon RDS
2.Launch an application server using Amazon EC2
3.Let application server (EC2) connect to a database server.
4.Try to log-in the terminal of RDS


Security should be implemented at every layer of your architecture in the application, on the server, within the network and when connecting to the Internet.
In this task, you will define Security Groups for the Amazon EC2 application server and Amazon RDS database instance:
The architecture will look like this:
First, you will create the App Security Group. It will be configured to permit incoming HTTP connections from the Internet.

# STEP 1: Setting up Security Groups
1.1Create Security Groups for your application server:Name: App-SG

Description: Allow HTTP access

VPC: You can create your own or use default

Add Rule: Type:HTTP

source anywhere



1.2Create Security Groups for your database server:
Name: DB-SG

Description: Allow DB access

VPC: You can create your own oruse default

Add Rule: 

Type: MySQL / Aurora

Source: Past the Group ID for App-SG

# STEP 2: Create an AWS RDS Database

# 2.1RDS→Create Database→Engine options, select MySQL→Templates, select Dev/Test-MySQLSettings:

•DV instance id: inventory-db

•Master username: master

•Master password: lab-password

•Confirm password: lab-password

2.2DB instance size(choose db.t2.micro)

2.3VPC (Choose the same as Step 1)

2.4Security Group: choose DB-SG created from Step 1

2.5Additional config:

•Initial database name: inventory

•Uncheck Enable Enhanced monitoring

2.6Create database


# STEP 3: Launch an Application Server using Amazon EC2
3.1AMI (choose Amazon Linux 2 AMI)

3.2 Instance Type (T2.micro)

3.3 Configure Instance Details:

•Network: As same as Step 1

•Subnet: Any Public Subnet (make sure it’s public)

•IAM role: you need to create a role allowing EC2 instance to make requests to AWS services.

•Advanced Details:The script will

(1) Install an Apache web server (httpd) and the PHP language 

(2) Download the Inventory application and the AWS SDK

(3) Activate the Webserver and configure it to automatically start on boot

3.4 Add Storage (Default)

3.5 Add tags Key: Name, Value: App Server

3.6 Configure Security Group (Select App-SG created from Step 1)

3.7 Launch

# STEP 4: Test the Application

4.1SSH into your EC2 instance created by Step 3, SSH -i your private-key.pemec2-user@your-ec2-address

4.2change permission –sudo chmod 777 -R /var/www/html

4.3Settings: 
•Endpoint: Check your RDS instance endpoints

•Database: inventory

•Username: master

•Password: lab-password

4.4Go to your localhost. Upload three php file to your EC2 instance –scp -I your-privatekey *.php ec2user@ec2-address:/var/www/html

4.5Go to your ec2 website

4.6The Application will now connect to the database load some initial data and display information.

4.7Insertthis record <your name, your student ID, random number> by clicking Inventory

My finished end IP:http://3.85.113.37/
