# Development Test

Application developed in Laravel + Vanilla JS. CSS and styles provided by Bootstrapp.

## Official Documentation

Database dumps are in the /database folder.

package url for download is also in:

https://we.tl/jWGpUXl80L

## Pricing Rules

I tried to make the pricing rules as flexible as possible. The solution for that was implement some expressions to make this work.

You have mostly two types of rules:

* Deal 
* Discount



So in the *rule* field, for **Deals** you can type:

*X FOR Y*

EX: 
*3 FOR 2*
or 
*2 FOR 1*



For **Discounts** you can specify:

EX:

*199.00 - the value of the dicount*

or

*199.00 WHEN_THERE 3 - the value discounted in a specific condition*
