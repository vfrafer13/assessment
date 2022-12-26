#!/bin/bash

echo "###### Setup new author"

author=`npx wp-env run cli "user create jahns jahns@example.com --role=author --display_name='Jeremy Jahns' --porcelain"`

echo "###### Add basic featured image"
image="https://www.ionos.mx/digitalguide/fileadmin/_processed_/4/a/csm_cloud-speicher-dienste-t_8adf7bb9bc.jpg";
thumbnail=`npx wp-env run cli "media import '${image}' --porcelain"`

echo "###### Creating 5 simple posts"
post_title="Test Post #"
post_content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
post_excerpt="This is a test post excerpt."
max=5
for (( i=1; i <= $max; ++i ))
do
    item_post_title="${post_title}${i}"
    item_post_content="${item_post_title}. ${post_content}"
    item_post_excerpt="${item_post_title}. ${post_excerpt}"
    result=`npx wp-env run cli "post create --post_title='${item_post_title}' --post_author='${author}' --post_status=publish --post_excerpt='${item_post_excerpt}' --post_content='${item_post_content}' --porcelain"`
    echo "###### Add featured image to posts"
    npx wp-env run cli "wp eval 'update_post_meta(${result} , \"_thumbnail_id\", ${thumbnail});'"
done

echo "###### Creating 5 simple pages"
page_title="Test Page #"
page_excerpt="This is a test page excerpt."
for (( i=1; i <= $max; ++i ))
do
    item_page_title="${page_title}${i}"
    item_page_content="${item_page_title}. ${post_content}"
    item_page_excerpt="${item_page_title}. ${page_excerpt}"
    npx wp-env run cli "post create --post_type=page --post_title='${item_page_title}' --post_author='${author}' --post_status=publish --post_excerpt='${item_page_excerpt}' --post_content='${item_page_content}'"
done

echo "###### Setup 5 sample genres"

npx wp-env run cli "term create genre Horror"
npx wp-env run cli "term create genre Romance"
npx wp-env run cli "term create genre Drama"
npx wp-env run cli "term create genre SciFi"
npx wp-env run cli "term create genre Folk"

addExtraDetailsToPost() {
    if [ ! -z "$1" ]
    then
        echo "###### Add featured image to post"
        npx wp-env run cli "media import ${2} --post_id=${1} --featured_image"
        echo "###### Add genre to post"
        npx wp-env run cli "wp eval 'wp_set_object_terms(${1} , array(${3}), \"genre\");'"
    fi
}

echo "###### Creating 10 movie posts"
echo "###### Creating movie post for The Northman"
image="https://i.ytimg.com/vi/oMSdFM12hOw/maxresdefault.jpg"
post_excerpt="Adventure awaits Prince Amleth, whose father was killed and mother was abducted by his ruthless uncle. However, the journey takes him through twists which unravel a dark truth about his family."
result=`npx wp-env run cli "post create --post_type=movie --post_title='The Northman' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"folk"'

echo "###### Creating movie post for Inception"
image="https://www.escapistmagazine.com/wp-content/uploads/2020/07/inception1.jpg"
post_excerpt="Cobb steals information from his targets by entering their dreams. Saito offers to wipe clean Cobbs criminal history as payment for performing an inception on his sick competitors son."
result=`npx wp-env run cli "post create --post_type=movie --post_title='Inception' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"scifi","drama"'

echo "###### Creating movie post for Spencer"
image="https://i.ytimg.com/vi/WllZh9aekDg/maxresdefault.jpg"
post_excerpt="Diana Spencer, struggling with mental-health problems during her Christmas holidays with the Royal Family at their Sandringham estate in Norfolk, England, decides to end her decade-long marriage to Prince Charles."
result=`npx wp-env run cli "post create --post_type=movie --post_title='Spencer' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"drama"'

echo "###### Creating movie post for The Piano"
image="https://thatmomentin.com/wp-content/uploads/2016/04/tumblr_n88atblDfh1tus777o3_1280.png"
post_excerpt="In the mid-19th century a mute woman is sent to New Zealand along with her young daughter and prized piano for an arranged marriage to a farmer, but is soon lusted after by a farm worker."
result=`npx wp-env run cli "post create --post_type=movie --post_title='The Piano' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"romance","drama"'

echo "###### Creating movie post for Gone Girl"
image="https://ychef.files.bbci.co.uk/976x549/p027pxn1.jpg"
post_excerpt="With his wifes disappearance having become the focus of an intense media circus, a man sees the spotlight turned on him when its suspected that he may not be innocent."
result=`npx wp-env run cli "post create --post_type=movie --post_title='Gone Girl' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"drama"'

echo "###### Creating movie post for The VVitch"
image="https://api.time.com/wp-content/uploads/2016/02/the-witch-still.jpg"
post_excerpt="In the New England of the 17th century, a banished Puritan family sets up a farm by the edge of a huge remote forest where no other family lives. Soon, sinister forces then start haunting them."
result=`npx wp-env run cli "post create --post_type=movie --post_title='The VVitch' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"folk","horror"'

echo "###### Creating movie post for Interstellar"
image="https://pics.filmaffinity.com/Interstellar-366875261-large.jpg"
post_excerpt="When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans."
result=`npx wp-env run cli "post create --post_type=movie --post_title='Interstellar' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"scifi","drama"'

echo "###### Creating movie post for Black Swan"
image="http://www.tasteofcinema.com/wp-content/uploads/2017/09/maxresdefault-1024x576.jpg"
post_excerpt="Nina, a ballerina, gets the chance to play the White Swan, Princess Odette. But she finds herself slipping into madness when Thomas, the artistic director, decides that Lily might fit the role better."
result=`npx wp-env run cli "post create --post_type=movie --post_title='Black Swan' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"horror","drama"'

echo "###### Creating movie post for The Power of the Dog"
image="https://i.ytimg.com/vi/8Uc1XGfof8k/maxresdefault.jpg"
post_excerpt="A domineering rancher responds with mocking cruelty when his brother brings home a new wife and her son, until the unexpected comes to pass."
result=`npx wp-env run cli "post create --post_type=movie --post_title='The Power of the Dog' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"drama"'

echo "###### Creating movie post for Requiem for a Dream"
image="https://m.media-amazon.com/images/I/51iGX8l0weL._AC_.jpg"
post_excerpt="Sara, a widow who lives a retired life, develops an obsession to lose weight and starts taking pills. However, she gets addicted to the medication and it takes a toll on her mental health."
result=`npx wp-env run cli "post create --post_type=movie --post_title='Requiem for a Dream' --post_author='${author}' --post_status=publish --post_excerpt='${post_excerpt}' --post_content='${post_excerpt} ${post_content}' --porcelain"`
addExtraDetailsToPost "${result}" "${image}" '"drama"'