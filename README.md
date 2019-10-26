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
