# System Charter and Description
* We are working on making the existing SPDX Dashboard a more fluid and robust experience by fixing outstanding issues and adding functionality. We will achieve this by communicating with our respective stakeholders and by collaborating as a group to set and reach goals.
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
* We own copyright

# Change Log
* Along with active issue tracking, we will rely on intentional and relevant commits at regular intervals with clear commit messages. 
* At this stage we don’t have a robust change log for our groups activity, but we are familiarizing ourselves with “SOCSDashboard” changes via the commit log and. 

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
* Continue looking into the existing code for the Dashboard to determine what ways the code can be modified to add functionality or improve existing issues.
* This will include the involvement of our community to determine the priority of the existing issues, as well as possible suggestions to append to our list of issues.
* This phase will be conceptual – determining how our issues can be handled while keeping the existing code in mind, while also very hands on -coding as needed to create our proof of concept.

## Milestone Three
* Begin by working through issues detailed on the SPDXDashboard’s issue tracker: https://github.com/socs-dev-env/SOCSDashboard/issues
  1. Listed in order of their defined "difficulty":
    * Import existing SPDX docs
    * Error Handling for running DoSOCS
    * LDAP Authentication
    * Create Comparison Interface
  2. This will include an integrated involvement with our communities as well, to see how these issues affect them currently and possibly a direction on how they would like these to be solved.
* Work on improving the overall functionality of the interface as it is currently:
  1. Creating a “flagging” system that can be used to designate specific licenses to stand out in searches and file views.  
    * The idea is that this flagging system will be viewed post-upload, users can designate licences while performing a search. This will give more power to the existing search command, and will not affect upload times.

## Milestone Four
* This milestone will primarily be a refinement/testing phase for our project.
  1. Continue to improve existing prototype through bug fixes
  2. Begin testing our code and the added functionality added to the interface for end users
  3. Continue to reach out to our community to discuss changes we have made to the existing project






