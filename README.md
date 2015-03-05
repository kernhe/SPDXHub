# System Charter and Description
* To make existing SPDX Dashboard a more robust experience by adding near-essential features such as a more tailored search method, license flagging and a tool for document comparison, which will allow more options for information retrieval. Communication with our stakeholders, team collaboration, and the clear and reasonable identification of issues and additions will be essential in achieving these goals. 

* Updating the existing dashboard to provide documents in the SPDX 2.0 spec. More information on that spec can be found here: https://spdx.org/SPDX-specifications/spdx-version-2.0

* The SPDX Dashboard allows users, at any level of the supply chain, to upload and scan packages to create SPDX documents. These documents are stored in a database to be retrieved at any time. 

# Stakeholders
* SPDX Community

# System Service Requests
**Linux Ubuntu system** 
* 12.04 Dual core or greater
* 32G of memory or greater

# Communication Management Plan
* We will keep regular and timely email correspondence – requiring a response within 24 hours for normal communication, and a response within 6 hours when communication concerns a deadline. 
* We will meet in person on Monday after class and Thursday at 5:30 for at least 30 minutes to discuss the current status of the project, set goals, and complete group work if necessary.
* We will communicate on GitHub through the issue tracker and comments.

# Code Management Plan
#### Internal SPDXHub team:
* **Before every work session:** individual members must stay consistent with the team by pulling the most current source code from the repo. This will reduce the likelihood of merge conflicts or overwriting significant work. 
* **During work session:** make regular commits with short messages. Contribute to a healthy change log. Commit small and commit often, and we will have a clear history that will help us define future goals and work allocation.
* **After any meaningful change and at the end of every work session:** push all work associated with the change to the repo. Keep the most current code housed in the central repo for other members to access.

#### External use and submissions:
* All submitted code must comply fully with the Apache 2.0 license. 
* Author will retain copyright of code submitted by pull request, regardless of whether or not it makes it into the source. 
* All pull requests will be reviewed and processed based on their relationship to outstanding issues and the issue’s priority. Merging code into the source will be a top priority when the submitted code works to solve outstanding issues.
* All other pull requests will be reviewed and processed in the order they come in. A contribution's value to the overall health will be determined by the SPDXHub internal team.
* Suggestions and critiques for system improvement are welcomed. 

# Database / Data Store Structures of the System
* The structure of the database will rely on the all of the required fields in the SPDX document found here: https://github.com/socs-dev-env/SOCSDatabase/blob/master/Schema.md
* Dataflow diagram can be found here: https://github.com/joverkamp/SPDXHub/blob/master/SPDXDashboard_DFD.svg

# Copyright Declarations and License Choice
* Apache 2.0 License
* Copyright © 2015 Jacob Overkamp, Nick Chickinelli, Khangal Erdenetsogt

# Change Log
* Change log and issue tracking can be found here: https://github.com/joverkamp/SPDXHub/issues

# Project Milestones

## Milestone One
* Collaborate to discuss plans for our project, and use our discussion to construct a deliverable that details:
  1. Overview/description for our project
  2. Milestone definitions
  3. System service requests
  4. Applicable stakeholders
  5. Communication management plan
  6. Data flow diagram
  7. Database structure
  8. Copyright declarations

## Milestone Two
1. Clarify SOCSDashboard outstanding issues within our scope
  * Determine what existing code and files we will be primarily working with as we implement our code. 
2. Begin Coding 
  * Get code working across local machines
  * Develop a structured mock up indicative of the direction we are taking the existing Dashboard
  * HTML structure for more robust search.
  * HTML structure for upload. Allow user to upload an SPDX document or a package. 
  * HTML structure for file view. More concise, clear layout. 
  * Begin programming file processing to read existing SPDX documents into our database.

## Milestone Three
* Begin by working through issues detailed on the SPDXDashboard’s issue tracker: https://github.com/socs-dev-env/SOCSDashboard/issues
  1. Listed in order of their defined "difficulty":
    * Import existing SPDX docs
    * Create Comparison Interface
  2. Creating a “flagging” system that can be used to designate specific licenses to stand out in searches and file views.  
    * The idea is that this flagging system will be viewed post-upload; users can designate licenses while performing a search.       This will give more power to the existing search command, and will not affect upload times.
  3. Update SPDX spec to 2.0

## Milestone Four
* This milestone will primarily be a refinement/testing phase for our project.
  1. Continue to improve existing prototype through bug fixes
  2. Begin testing our code and the added functionality added to the interface for end users
  3. Continue to reach out to our community to discuss changes we have made to the existing project






