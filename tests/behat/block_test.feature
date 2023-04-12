@block @block_test
Feature: Block test
  Create a new course in Moodle and add several different modules (e.g., forums, assignments, quizzes, etc.) to the course.

Enroll a few students in the course.

As a teacher, navigate to the course page and add the "test" block to the page.

Verify that the "test" block is displayed on the course page and that it shows a list of all the course modules with their IDs, names, creation dates, and completion statuses.

Log in as one of the enrolled students and complete one or more of the course modules.

Refresh the course page and verify that the completion status for the modules that were completed by the student is now displayed as "completed" in the "test" block.

Log out and log back in as the teacher and verify that the completion status for all the course modules is displayed correctly in the "test" block.

Edit the settings of one of the modules and make it invisible to students.

Refresh the course page as a student and verify that the invisible module is no longer displayed in the "test" block.

Refresh the course page as a teacher and verify that the invisible module is still displayed in the "test" block, but with a different color or style to indicate that it is invisible.

Edit the settings of one of the modules and delete it from the course.

Refresh the course page as a student and verify that the deleted module is no longer displayed in the "test" block.

Refresh the course page as a teacher and verify that the deleted module is also no longer displayed in the "test" block.