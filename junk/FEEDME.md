# [NewsCatcher API]([)](https://free-docs.newscatcherapi.com/?javascript#request-parameters)

## Advanced Querying

**Exact Match** ("quotes")
Use double quotes for exact match.

When you want to search for the English (lang=en) articles that mention Tim Cook you should do the following query:

`q="Tim Cook"`

If you write q=Tim Cook then, it will bee treated as `q=Tim OR Cook`. In that case, every article that mentions tim or cook will match.

Moreover, if you specify `lang=en` that will also match the articles with cooking, cooked, and other stems of word cook

**Boolean:** AND AND can also be written as &&
AND operator makes tokens from both sides to be present in the text. For example, if we want both Microsoft and Tesla to be present in the returned news articles, our q parameter should look as follows:

`q=Microsoft AND Tesla`

or

`q=Microsoft && Tesla`

Boolean: OR
OR can also be written as ||

OR operator means that either the left or the right sides of OR have to be satisfied.

OR is the default operator. When your q input is more than 1 word, OR operator is added between each word behind the scenes. Therefore, Apple Microsoft Tesla is the same as Apple OR Microsoft OR Tesla

You should use Grouping when you want to logically group a set of tokens. For example:

q=(Apple AND Cook) OR (Microsoft AND Gates)

or

q=(Apple && Cook) || (Microsoft && Gates)

Boolean: NOT
NOT can also be written as !

Use NOT operator when you want the token from its right to not be present. For example, if we want to search for articles about Microsoft and not about Tesla, our q parameter should look as follows:

q=Microsoft NOT Tesla

or

q=Microsoft !Tesla

MUST (+) & MUST NOT (-)
Prepend a token with a + sign if it MUST appear in the searched text

Make sure that your API call is URL encoded. Check the user_input object in the Response Body to see how our back-end saw your request.

+ will be escaped by default in many situations.

Prepend a token with a - sign if it MUST NOT appear in the searched text

For example, if we want to search for news articles that contain Elon Musk but not Grimes, we have to write:

q=Elon Musk -Grimes

"But wait, the query above will also match the documents where only Elon or Musk are present" Shouldn't we write +Elon +Musk -Grimes ?

If we write +Elon +Musk -Grimes that will mean that Elon and Musk should be present in the text, however, not in that particular. The "correct" query should look like this:

q="Elon Musk" -Grimes

In this case, we will search for exact match of "Elon Musk" , plus, Grimes must not be present.

Pro Tip. In general, you should always put person and company names into quotes