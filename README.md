# Laravel Blog Application with TDD :star2:	
<img src="https://camo.githubusercontent.com/0a47442b4a3342164618c1838f886fbbf2db735b585a8ba985b320318f0132bc/68747470733a2f2f696d672e736869656c64732e696f2f636f6465636f762f632f6769746875622f6477796c2f686170692d617574682d6a7774322e7376673f6d61784167653d32353932303030" alt="codecov.io Code Coverage" data-canonical-src="https://img.shields.io/codecov/c/github/dwyl/hapi-auth-jwt2.svg?maxAge=2592000" style="max-width: 100%;">

> laravel blog web application which is wrote with `laravel v.8` with 100% Test Coverage 

## Table of Content
1. [Admin Panel Shots](#admin-panel-shots)
1. [User Types](#user-types)   
1. [Database](#Database)
1. [Admin Abiliities](#admin-abilities)
1. [Writer Abilities](#writer-abilities)
1. [User Abilities](#user-abilities)
1. [TDD](#tdd)

## Admin Panel Shots
Here You Can See Admin Panel View

<details open>
<summary><h3>Admin Panel shots :point_down: :framed_picture: </h3>	</summary>
    
</details>


## Database

Here is Blog Database Schema

![blog](https://user-images.githubusercontent.com/10767713/177008216-55ef1dd2-5b9f-420b-9e72-fe4b8f721654.png)

<details>
<summary><h3>Admin Panel shots :point_down: :framed_picture:</h3>	</summary>

![image](https://user-images.githubusercontent.com/10767713/177007653-6c8af1a8-3b5c-4dad-8338-49c9fac74e37.png)


</details>

## User Types
_we have these user types_

|#|User TYpe|Description|
|---|---|---|
|1|`admin`|admin can define a writer| 
|2|`writer`|writer can write posts|
|3|`user`|user can see posts |

## Admin Abilities

1. Define `new Writer`
1. `See` Each Writer Posts
1. Define `New Category` 
1. `See` All Category

## Writer Abilities

1. Write Posts
1. Define `Tags` for a Post   
1. See Post Comments
1. Able to approve comments to show them under a post   
1. `TODO`Able to Reply Comment


<details>
    
<summary>
<h4>shots :framed_picture:</h4>
</summary>

![image](https://user-images.githubusercontent.com/10767713/177008061-07943e92-bf0c-4bee-9e39-75eaec654956.png)


![image](https://user-images.githubusercontent.com/10767713/177008089-ea261548-1771-44a1-bff7-23bd6567c2cc.png)

![image](https://user-images.githubusercontent.com/10767713/177008107-71d79094-9ce9-4a47-aec0-535e9d92456b.png)

![image](https://user-images.githubusercontent.com/10767713/177008132-6ce4d5ff-d593-421b-a4ee-1ef58869663f.png)

</details>



## User Abilities
* Able to See Posts 
* Write Comments 

<details>

<summary>
<h4>shots :framed_picture:</h4>
</summary>

![image](https://user-images.githubusercontent.com/10767713/177008027-d7a2c923-16c4-4ae3-89bb-b29e32efd3b1.png)


</details>



## TDD
These web app `100% coverage` Test


**list of TDD**
* Test for `Admin` abilities
* Test for `Writer` abilities
* Test for `User` abilities
* Test for `Guest` User
* Test for `Authentication`
