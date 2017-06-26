# Abantecart Error Sample Extension
Extension for Abantecart showing how validate account customer model from both create and edit pages

### Install
* First install Abantecart 2.10 or 2.11
* Copy all files into "extensions" directory

### How to simulate the error
Once extension installed and STATUS=ON, do the following
* Go to store front and click ACCOUNT menu
* At Account Login page, check the Register Account option from "I AM A NEW CUSTOMER" pannel and click Continue button
* Fill out the form paying attention to required fields
* Once you have finished filling the form, click Continue button
** Be aware of firstname field error message, particularly the "from account CREATE page" part
* Now disable the Extension so you can be able to finish creating the account
* Login to that new account and go to "Edit account details" under "MY ACCOUNT"
* Just click the Continue button and see what happen
** Compare this message with the previous one and pay attention to the message saying "from account EDIT page"

### Why is that happening?

Ok, now you see that we deal with the two account pages differently, but from the same hook method.
Take a look at ``core\sample_template_extension.php`` file and search for ``onModelAccountCustomer_ValidateData`` hook method.
You will notice that I took advantage of "password" field to determine if the hook caller is the edit page or the create page.
It is only a trick to solve the problem because the "password" field exists at create page and not exists at edit page. 
This way, checking the existance of that field I can tell which page called the hook method.

### Is there a better approach?

Yes, there is. I am placing a pull request at Abantecart's GIT repository, asking the developers to modify only three lines of code!
This way we can trace the caller page from its function name. 
The lines are 651, 711, 779 from ``storefront\model\account\customer.php`` page.
I am requesting to change the code (same for the three lines) from:
```
$this->extensions->hk_ValidateData($this);
```
to:
```
$this->extensions->hk_ValidateData($this, __FUNCTION__);
```
This only modification changes everything! That way we can implement ``onModelAccountCustomer_ValidateData`` hook method the right way, to look like this:

```
if ($this->baseObject_method == "validateEditData") {
	$that->error['firstname'] = 'Error at firstname field from account EDIT page!';
} else {
    $that->error['firstname'] = 'Error at firstname field from account CREATE page!';
}
```

