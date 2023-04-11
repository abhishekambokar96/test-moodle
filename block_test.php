<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file contains the Activity modules block.
 *
 * @package    block_test
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_test extends block_base {
    public function init() {
        $this->title = get_string('course_modules', 'block_test');
    }
    
    public function applicable_formats() {
        return array('course-view' => true);
    }
    
    public function get_content() {
        global $OUTPUT, $COURSE, $USER;
        $context = context_course::instance($COURSE->id);
        $modulelist = get_course_mods($COURSE->id);
        $content = '';
        foreach ($modulelist as $module) {
            $modinfo = get_fast_modinfo($COURSE->id);
            $instance = $modinfo->get_cm($module->id);
            if ($instance->visible) {
                $cmid = $instance->id;
                $modname = $instance->name;
                $creationdate = userdate($instance->created, '%d-%m-%Y');
                $completion = '';
                if ($completioninfo = $this->get_module_completion_info($instance, $USER->id)) {
                    if ($completioninfo->iscomplete) {
                        $completion = get_string('completed', 'completion');
                    }
                }
                $content .= "<div><a href='" . $instance->url . "'>$cmid-$modname-$creationdate-$completion</a></div>";
            }
        }
        return $content;
    }
    
    public function get_module_completion_info($instance, $userid) {
        $completion = new completion_info($instance->get_module());
        return $completion->get_activities_completion($userid, true);
    }
}
