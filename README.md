# tbt-rewards

This is a test project requested by TBT Marketing to demonstrate PHP programming proficiency. The brief can be found in brief.docx in the project root.

- Matthew Dawkins
- matthew.dawkins@gmail.com

## Approach

The solution will be built using Laravel 5.4, taking advantage of existing well-documented libraries for some functionality. This is partly for speed of development, and partly for the assurance of security and performance. Since user login is a key requirement, it makes sense to use an established and trusted solution rather than creating something from scratch; if this were deployed to production, security updates would be available easily using composer to include the latest version of the library.

As far as possible, all resources should be local, rather than relying on internet connectivity. While this would not be advisable for a production solution, for the purposes of this project it ensures that it should work reliably and predictably even if there is no internet connection on the day of demonstration.

## Customer login

Laravel's built-in user management will be used, allowing a quick and easy implementation of registration and login functionality. Each 'user' will represent a person, who will be able to submit claims for any customer, and will be able to see existing claims and their status (though that may be a future development, as it is not part of the original brief).

## Data collection and file upload

Forms will be validated server-side. Submissions will be saved to the local database progressively, rather than requiring full completion from the start, with the final step for the user being to 'submit' the claim. This allows us to capture details reliably and add an unlimited number of attachments to an existing entry in the database. Users will be able to see incomplete submissions and edit them until they are 'submitted'.

Uploaded files will be renamed to ensure there are no conflicts with other attachments from other users. Files will be recorded in the database to assign them to a claim.

Another reason for using Laravel is its default mail architecture uses an API on top of SwiftMailer.

## Administrators

We will use the same login form as the customer, with administrators being identified by a flag in the database for authorisation. A default admin account will be seeded during development/deployment. A future recommendation would be to allow administrators to add further administrator accounts, or set existing users as administrators; we will build the solution with this in mind, even if it is not developed initially.

Emphasis will primarily be on reviewing claims from the web interface, allowing admins to view the full details of each claim easily and download individual attachments. There will also be the option to download all claims in CSV format. Since there are an unlimited number of attachments for each entry, it is proposed to provide a single link in the CSV file that will download all attachments for that claim as a zip file; we will need an endpoint that accepts a reference to the entry ID, zips all relevant files and immediately sends it as a download.

## Development

- XAMPP, with alias pointing to project_root/src/public/
- Git
- Run `composer install`
- Run `npm install`
- If gulp is not already installed, run `npm install --global gulp`
- To compile SASS, run `gulp sass`

## Recommendations for future development

- Define companies in their own database table for easy re-use. Users would associate themselves with a company, searching by name and creating the company if it doesn't already exist. This allows for multiple users per company, and means users don't need to enter the company details each time they make a claim.
- Allow administrators to define the reward options from the website, rather than using a hard-coded list.
- Allow administrators to approve/decline a claim, with feedback being emailed to the user with the reason(s).
