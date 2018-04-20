# Assignment 2: Detecting Communities
<Nahom> <Asnake>


## Introduction

This assignment is based on a European research institution that have members sending email to each other where each member belongs to a department
unlike the previous assignment the graph in this assignment have directed edges. The institution have 42 departments and a total of 1004 members -
each 
elonging to one department. 

## Part 1: Email-EU-core network
### Methods

I have used the gephi tool to analyze the graph. After downloading both text files(members to departments and source to Targets). I added the headers 
'Node Department' and 'Source Target' to the files respectively and converted the file to csv format to simplify it for gephi. Then I imported the data
as a spreahsheet in gephi. I used the algorithm (Louvain algorithm) to identify the communities. I have also used the rest of the tools to analayze the
data in gephi. 

I have used the force attlas layout to be able to organize the graph and make it look better. 

### Results

The ground truth communties have a community of the first one with highest of 24.78% and followed by 17.81% .And about 20 components are connected and 
the average degree is 24.444 with the maximum out degree being 334 and the maximum in degree being 212. The node with the highest page rank is '160'.
The graph have a density of 0.25.

Stats:
Av. degree : 25.444
Network Diameter :7
Avg. Clustering co-officient :0.372
Avg. Path length: 2.653


![algo-communities](image.png)
### Discussion
The ground truth communities are measured by comparing the members to the departments but the algorthm communities are created by howwell the links are
connected.



## Part 2: YouTube social network
### Methods
My pc was unable to finish...
