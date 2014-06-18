ODI-Predictor
=============

Prediction of One Day International matches using the Naive Bayes theorem. 

I took records of 10 years (2001-2011) of ODI matches and prepared a training set.
The format of the data was SQL. I wrote many queries to get rid of null values. I also removed the smaller teams which had insignificant number of matches. 
Now to predict a win or loss for a particular team, I considered various factors.
For example it is an India vs Australia match at Wankhede Stadium, India.
1.	India’s record in past 10 years.
2.	India’s record in past 2 years. (recent form)
3.	India’s record in India in past 10 years.
4.	India’s record in India in past 2 years. (recent form)
5.	India’s record at Wankhede, past 10 years.
6.	India’s record at Wankhede, past 2 years. (recent form)
7.	Australia’s record in past 10 years.
8.	Australia’s record in past two years.
9.	Australia’s record against India in past 10 years.
10.	Australia’s record against India in past 2 years.
11.	Australia’s record against India in past 10 years in India.
12.	Australia’s record against India in past 2 years in India.

So I took probabilities of all,


Example, India played 322 matches in 10 years and won 140, so the winning probability is 140/322 and so on for all the other factors.

I used the Naive Bayes Algorithm. In Naive Bayes Algorithm we multiply all probabilities. To simplify the calculations I added the log of all probabilities because log(P1*P2*P3) = log(P1) + log(P2) + log(P3). Now there is a chance that a certain probability might be zero and hence we add an arbitrary number to each one to eliminate the zero case.

I then compared the winning and losing probabilities and calculated the percentage and visualized it by a JavaScript library.
