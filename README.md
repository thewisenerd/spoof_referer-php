author: Vineeth Raj <contact.twn@openmailbox.org>

written to 'exploit' imdb website's poster api
'exploit': workaround hotlinking blocking by spoofing referer url

options:

?url=<base64_encode(url_to_get)>
?referer=<base64_encode(url_to_spoof_as_referer)>
?content=image/text/json/<valid content type>
?type=png/jpeg/html/plain/<valid content encoding>

