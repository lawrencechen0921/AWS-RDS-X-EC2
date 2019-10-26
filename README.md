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
