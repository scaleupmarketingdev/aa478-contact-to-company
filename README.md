# aa478-contact-to-company
<p align="center">
<img src="https://gedlynk.com/wp-content/uploads/2015/11/Infusionsoft-Logo-EPS-vector-image-2.png" style="width:35%;"/>
</p>

<h3>For more info about the infusionsoft syntax Click <a href="https://developer.infusionsoft.com/docs/xml-rpc/#contact">here</a></h3>
<h4>Current URL: https://scaleupmarketing.asia/httpscripts/aa478/note/contact_to_company.php</h4>
Table schema for infusionsoft: <a href="https://developer.infusionsoft.com/docs/table-schema/">Click here</a>
<p>Script Description: 
When HTTP POST REQUEST is triggered through the asia pacific conference website.<br>
carrying the variables contactId, IndustryType, Delegate, Speaker & IndustryDescription.

It will first search for the "Company" and "CompanyID" data from the contact using the "contactId" variable data.  
The script will proceed into checking if the variable "Speaker" is empty.   
If the variable is empty it will insert the data from IndustryType, IndustryDescription and Delegate to the Company table and assign it to the Company that we fetched earlier.     Else if the variable IndustryType doesn't contain any data, it will insert the data from Speaker, IndustryDescription and Delegate to the Company table and assign it to the Company that we fetched earlier.   
Else if the variable Delegate is empty will insert the data from IndustryType, IndustryDescription and Speaher to the Company table and assign it to the Company that we fetched earlier.   
Else if the variable IndustryDescription  is empty will insert the data from IndustryType, Speaker and Delegate to the Company table and assign it to the Company that we fetched earlier.   


The next step is a nested else if statement that will check 2 variables with different variable combination if it is empty or not.(Scanning 2 variables at a time)and update the data into the company table if the statement is true.   
The next is it will scan the 3 variables with different variable combination and update data into the company table.   
Lastly it will check all the 4 variables (IndustryType, Delegate, Speaker & IndustryDescription) if it has value in it   
and insert the data into the company table if the statement is true.
</p>
