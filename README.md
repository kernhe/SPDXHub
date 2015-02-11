# System Charter and Description
* To make existing SPDX Dashboard a more fluid and robust experience. Communication with our stakeholders, team collaboration,  and the clear and reasonable identification of issues and additions will be essential in achieving these goals. 
* The SPDX Dashboard allows users, at any level of the supply chain, to upload and scan packages to create SPDX documents. These documents are stored in a database to be retrieved at any time. 

# Stakeholders
* SPDX Community

# System Service Requests
* None applicable at this time

# Communication Management Plan
* We will keep regular and timely email correspondence – requiring a response within 24 hours for normal communication, and a response within 6 hours when communication concerns a deadline. 
* We will meet in person on monday after class and thursday at 5:30 for at least 30 mins to discuss the current status of the project, set goals, and complete group work if necessary.
* We will keep a shared google drive folder with assignment drafts and ongoing working, and housekeeping items. 
* We will use Google hangouts and the chat feature as necessary for communication outside of email and in person meetings.

# Database / Data Store Structures of the System
* The structure of the database will rely on the all of the required fields in the SPDX document found here: 
  1. https://github.com/socs-dev-env/SOCSDatabase/blob/master/Schema.md
* The SPDX 2.0 spec, itself, will be the final measure as to the shape of our database. 

# Copyright Declarations and License Choice
* Apache 2.0 License
* Copyright © 2015 Jacob Overkamp, Nick Chickinelli, Khangal Erdenetsogt

# Change Log
* Along with active issue tracking, we will rely on intentional and relevant commits at regular intervals with clear commit messages.
* Find issue tracking here: https://github.com/joverkamp/SPDXHub/issues

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
  * Determine what existing code and files we will be primarly working with as we impliment our code. 
  * Reach out to community to clarifiy outstanading issues.
  * Begin working relationship wtih stakeholders.
2. Begin Coding 
  * Setup up the infrastructure for project.

## Milestone Three
* Begin by working through issues detailed on the SPDXDashboard’s issue tracker: https://github.com/socs-dev-env/SOCSDashboard/issues
  1. Listed in order of their defined "difficulty":
    * Import existing SPDX docs
    * Error Handling for running DoSOCS
    * Create Comparison Interface
  2. Creating a “flagging” system that can be used to designate specific licenses to stand out in searches and file views.  
    * The idea is that this flagging system will be viewed post-upload, users can designate licences while performing a search.       This will give more power to the existing search command, and will not affect upload times.
  3. Update SPDX spec to 2.0

## Milestone Four
* This milestone will primarily be a refinement/testing phase for our project.
  1. Continue to improve existing prototype through bug fixes
  2. Begin testing our code and the added functionality added to the interface for end users
  3. Continue to reach out to our community to discuss changes we have made to the existing project






