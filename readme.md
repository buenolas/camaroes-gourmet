##Camarões Gourmet
This application is a website in construction, wich obviously means its not finished yet. In this version I just prepared the API to receive data and 
store that data in the database, in this case I am using Supabase on this project (the background of Supabase is actually Postgres wich I am more familiar with).
A very few things is done on this version, basically the GET and DELETE methods its ready, but the POST and PUT I will need to refactor, right now its 
possible to enter with a null image, wich its not what I wanted at first, but for now it works just to test if Supabase is working and to start making some forms in
the front-end to test some more things.

##Goal
My goal in this project is to build an website for a store, showing in the home page a little bit of their story, location, some FAQ's, 
and have a route /produtos (means products in portuguese) that will show their catalog with prices, name of the product, a short description and
an image. The project it self is more about introducing the store to new clients, each product when visualized will have an icon of whatsapp that
redirect directly to their chat to order that especific product.
