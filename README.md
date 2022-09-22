## task details 

i make backend project, and generate api, you can test it with the postman collection that i attachted at the email.

# 1- ads with related tags/categories
/api/ad (get request)
and we can filter the response by sending parameter with the request (category-id , tag_id) both of one of them.

# 2- notify the advertiser one day before the ad
we can do the notification with database or email or both of them,
when try the task schedule be ware of timezone.

# 3- crud for tags and categories
api/tag (api response)
api/category (api response)
 
# 4- Showing Advertiser Ads
we can return the ads with advertiser, or we can return just the ads for any advertiser
api/advertiser/{advertiser_id}/ads (get request) 

## don't forget to seed the data.
