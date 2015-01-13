title: Get up and running with Event Sourcing
slug: get-up-and-running-with-event-sourcing
status: published
date: 01 jan 2015
tags: event sourcing,es,cqrs,object oriented
meta-description: Event sourcing is hard. It's a mostly unknown development concept that isn't new, but is well underused. This is a post listing resources about Event Sourcing.

-------


Event Sourcing is a concept you'll start to hear more and more in the development community. Yet, there's no real aggregate of different talks or just resources in general available. Everything is spread out. Getting started with Event Sourcing isn't the easiest thing to do.

This post has as goal to regroup as much information as possible about event sourcing. This will include links to conference talks, slideshows, github repositories, blog posts, and so on.

The reason for this blog post is that I'm also still learning about Event Sourcing, and find it very difficult to get information about this concept. So, for other people in the same situation, or just my future self, this post to have a general place that lists most resources about the topic.


## What is event sourcing ?

Event Sourcing is a different way of thinking about how the content of your website is stored, more precisely how actions are stored. We're all used to relational databases and how we store data inside them. 

As an example lets, take a shopping cart. Without going into details, a shopping cart might have a basket table and a related line items table. A basket can have many line items and a line item belongs to one basket. Pretty straightforward.

### The old, traditional way

A user visits our website, and adds product #1 to his basket. Now we have basket id #1 with a related line item which has the basket's id as foreign key. That line item stores which product was added an its quantity.

Our user adds another item, product #2 to his basket. Right before checking out, our user decides to take product #1 out of the basket and checks out.

Now imagine you domain expert asks you 5 months later, if you can get all the products that were removed 1 minute before checking out; **from the launchdate** of the website! Awtch! That's not a nice position to be in, since you had that information be decided not to store it. The only thing you can do is implement this feature **from now on**.

We, as developers, can't know what the requirements of the business experts will be in the future. To avoid this loss of data: **Event Sourcing**. Because yes, if you're not using event sourcing, you are losing data. **Whenever you have an update or delete statement somewhere in your code, you're losing data.**

### Event Sourcing

"*But, what's the solution ?*" You might ask. Enter, event sourcing. To understand event sourcing we need to think of our data as a series of actions taking place in the past. Let's take our previous example:

- Basket created,
- Product #1 added to basket at timestamp x,
- Product #2 added to basket at timestamp x,
- Product #1 removed from basket at timestamp x,
- Entering payement information at timestamp x,
- Checking out at timestamp x.

This is a series of events that represents the action of a user buying something on your website. And this is what we store in the database! Now if our domain expert asks us to get that same information, we still have it! It's all stored in a procedural way. We can replay these events at any point in time.

This is the basic idea of event sourcing. 

## Resources

### Conference talks

- [Greg Young](https://twitter.com/gregyoung) has given multiple talks about event sourcing, the one I prefered was the one at 'Code on the Beach 2014' conference: [CQRS and Event Sourcing](https://www.youtube.com/watch?v=JHGkaShoyNs)
- [Practical Event Sourcing](http://verraes.net/2014/03/practical-event-sourcing/) by Mathias Verraes
- [CQRS/DDD](https://www.youtube.com/watch?v=KXqrBySgX-s) by Greg Young

### Slides

- [Event Sourcing in practice](http://ookami86.github.io/event-sourcing-in-practice/)

### Courses

- [GregYoung 8 CQRS Class](https://www.youtube.com/watch?v=whCk1Q87_ZI) - This is a 6h30 course by Grey Young on CQRS and Event Sourcing.

### Blog posts

- [Practical Event Sourcing](http://verraes.net/2014/03/practical-event-sourcing/) by Mathias Verraes.
- [Event Sourcing](http://martinfowler.com/eaaDev/EventSourcing.html) by Martin Fowler

### Code examples

- [EventCentric.Core](https://github.com/event-centric/EventCentric.Core) Event Sourcing and CQRS in PHP

### Packages

- [Broadway](https://github.com/qandidate-labs/broadway) (php)

### Other

- [DDDinPHP](https://groups.google.com/forum/?utm_medium=email&utm_source=footer#!forum/dddinphp) google group
- [DDD/CQRS](https://groups.google.com/forum/?utm_medium=email&utm_source=footer#!forum/dddcqrs) google group



## Conclusion

I hope this post has given you the necessary information about Event Sourcing to at least make you **curious** and give you the links to resources to learn more about event sourcing and cqrs.

Please note that this post will be continually kept up to date as I'm finding more resources about event sourcing.

Please don't hesite to share your resourcing in the comments below, and I will add them to the list.











