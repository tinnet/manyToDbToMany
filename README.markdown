# Training/Teaching challenge in PHP

This is a training exercise that should allow a employer to evaluate the skills of a potential employee.

## WHAT IS THIS ABOUT

* this is intended to be a tool, that allows the user to
    * upload a file in various formats
    * put the the imported data in a database
    * show the data in that file in a fronted
    * export the data to other various formats
* one uploaded file stands for one _project_
* the files contain keys and their translations
    * the files _can_ have multiple (>2) languages

## WHAT THE PARTICIPANT SHOULD DO

### minimum
* look at everything marked **TODO** and understand why something has to be done
* write a reader for the given sample2.json file
* write a better database class (and an appropriate database model)
* write a writer for the TMX format

### extra credit
* look at everything marked **FIXME** and understand why it has to be fixed
* allow to edit the data within the fronted
* replace all occurrences of the $key array with a Key class

## BEWARE!
* this exercise if targeted to be one day (8h) of work.
    * Employer: If you can't ask potential employees to invest this much time, don't give them this exercise
    * Potential Employee : If you need (a lot) more time for this, you probably spend to much time one of the parts, instead of getting all of them to work
* as in most test, the way a target is reached is as important or even more important than the target
    * Employer
        * Try to look at how and why somebody did something, not just what they did
    * Potential Employee
        * Document how you worked (especially the decisions you made)
        * Use version control, seriously