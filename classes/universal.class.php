<?php 
namespace ProjectManager;
use DBTemplates\DBConnectionTemplate;
class ProjectOperations extends DBConnectionTemplate{
    public function add_user($o){
        $sql = "INSERT INTO `users`(`fname`,`lname`,`dob`,`gender`,`phone`,`address`,
                `role`,`password`)VALUES(?,?,?,?,?,?,?,?);";
                $param_type = "isiissssssiiiiii";
                $param_list = [   
                    $o["fname"],
                    $o["lname"],
                    $o["dob"],
                    $o["gender"],
                    $o["phone"],
                    $o["address"],
                    $o["role"],
                    $o["password"]
                ];
                return $this->push_record($sql,$param_type,$param_list);        
    } 
    public function user_exist($seck){
        $sql = "SELECT * FROM `users` 
                WHERE `users`.`user_id` = ?;";
                $param_type = "i";
                $param_list = [
                    $seck
                ];
                return $this->fetch_bool_II($sql,$param_type,$param_list);
    }
    public function get_with_email($email){
        $sql = "SELECT * FROM `users` 
                WHERE `users`.`email` = ?;";
                $param_type = "s";
                $param_arr = [$email];
                return $this->fetch_record_II($sql,$param_type,$param_arr);
    }
    public function get_with_mobile($phone_number){
        $sql = "SELECT * FROM `users` 
                WHERE `users`.`phone` = ?;";
                $param_type = "s";
                $param_arr = [$phone_number];
                return $this->fetch_record_II($sql,$param_type,$param_arr);
    }
    public function get_with_id($user_id){
        $sql = "SELECT * FROM `users` 
                WHERE `users`.`user_id` = ?;";
                $param_type = "i";
                $param_arr = [$user_id];
                return $this->fetch_record_II($sql,$param_type,$param_arr);
    }
    public function add_project($o){
        $sql = "INSERT INTO `projects`(`proj_name`,`user_id`,`description`,`start_date`,`end_date`,`status`)VALUES(?,?,?,?,?,?);";
                $param_type = "sissss";
                $param_list = [   
                    $o["pj_name"],
                    $o["user_id"],
                    $o["pj_desc"],
                    $o["pj_sdate"],
                    $o["pj_edate"],
                    $o["status"]
                ];
                return $this->push_record_get_id($sql,$param_type,$param_list);        
    } 
    public function update_project($o){
        $sql = "UPDATE `projects`
                SET `proj_name` = ?, 
                    `user_id` = ?, 
                    `description` = ?, 
                    `start_date` = ?, 
                    `end_date` = ?, 
                    `status` = ?
                WHERE `projects`.`proj_id` = ?;";
                 $param_type = "sisssii";               
                 $param_list = [
                    $o["pj_name"],
                    $o["user_id"],
                    $o["pj_desc"],
                    $o["pj_sdate"],
                    $o["pj_edate"],
                    $o["status"],
                    $o["proj_id"]
                 ];      
                 return $this->push_record($sql,$param_type,$param_list);
    }
    public function get_total_projects($id){
        $sql ="SELECT COUNT(`projects`.`prpj_id`) AS `total` 
                FROM `projects`
                WHERE `projects`.`user_id` = ?;";
                $param_type = "i";
                $param_list = [
                   $id
                ];
                return $this->fetch_records_II($sql,$param_type,$param_list);
    }
    public function get_projects($offset,$limit,$user_id){
        $sql ="SELECT *, COUNT(`attachments`.`proj_id`) AS `total`
                FROM `projects`
                INNER JOIN `attachments`
                    ON `attachments`.`proj_id` = `projects`.`proj_id`
                WHERE `projects`.`user_id` = ?
                ORDER BY `projects`.`proj_id` DESC
                LIMIT $offset,$limit;";
                $param_type = "i";
                $param_list = [
                   $user_id
                ];
                return $this->fetch_records_II($sql,$param_type,$param_list);;
    }
    public function get_projects_with_id($offset,$products_per_page){
        $sql ="SELECT * FROM `projects`
                GROUP BY `projects`.`proj_id` 
                ORDER BY `projects`.`proj_id` DESC
                LIMIT $offset,$products_per_page;";
                return $this->fetch_records($sql);
    }
    public function get_project_with_id($pid){
        $sql ="SELECT * FROM `projects`
                WHERE `projects`.`proj_id` = ?;";
                $param_type = "i";
                $param_list = [$pid];
                return $this->fetch_record_II($sql,$param_type,$param_list);
    }
    public function get_projects_discussed($offset,$limit,$user_id){
        $sql ="SELECT *, COUNT(`attachments`.`proj_id`) AS `total`
                FROM `projects`
                INNER JOIN `attachments`
                    ON `attachments`.`proj_id` = `projects`.`proj_id`
                INNER JOIN `discussions`
                        ON `discussions`.`proj_id` = `discussions`.`proj_id`
                WHERE `discussions`.`user_id` = ?
                GROUP BY `projects`.`proj_id` 
                ORDER BY `projects`.`proj_id` DESC
                LIMIT $offset,$limit;";
                $param_type = "i";
                $param_list = [
                  $user_id
                ];
                return $this->fetch_records_II($sql,$param_type,$param_list);
    }
    public function get_total_attachments($proj_id){
        $sql ="SELECT COUNT(*) AS `total` 
                FROM `attachments`
                WHERE `attachments`.`pro_id` =?;";
                $param_type = "i";
                $param_list = [
                    $proj_id
                ];
                return $this->fetch_records_II($sql,$param_type,$param_list);
    }
    public function get_attachments($proj_id){
        $sql ="SELECT * FROM `attachments`
                WHERE `attachments`.`proj_id` =?;";
                $param_type = "i";
                $param_list = [
                    $proj_id
                ];
                return $this->fetch_records_II($sql,$param_type,$param_list);
    }
    public function add_task($o){
        $sql = "INSERT INTO `tasks`(`task_name`,`description`,`proj_id`,`start_date`,`end_date`)VALUES(?,?,?,?,?);";
                $param_type = "ssiss";
                $param_list = [   
                    $o["task_name"],
                    $o["task_desc"],
                    $o["proj_id"],
                    $o["task_sdate"],
                    $o["task_edate"]
                ];
                return $this->push_record($sql,$param_type,$param_list);        
    } 
    public function add_milestone($o){
        $sql = "INSERT INTO `milestones`(`proj_id`,`t_id`,`milestone_name`,`description`,
                `due_date`)VALUES(?,?,?,?,?);";
                $param_type = "iisss";
                $param_list = [   
                    $o["proj_id"],
                    $o["task_id"],
                    $o["task_name"],
                    $o["task_desc"],
                    $o["task_edate"]
                ];
                return $this->push_record($sql,$param_type,$param_list);        
    } 
    public function add_filesharing($o){
        $sql = "INSERT INTO `filesharing`(`proj_id`,`user_id`,`status`)VALUES(?,?,?);";
                $param_type = "iis";
                $param_list = [   
                    $o["proj_id"],
                    $o["user_id"],
                    $o["status"]
                ];
                return $this->push_record($sql,$param_type,$param_list);        
    } 
    public function add_discussion($proj_id,$user_id,$suggestion){
        $sql = "INSERT INTO `discussions`(`proj_id`, `user_id`, `suggestion`) VALUES (?,?,?);";
                $param_type = "iis";               
                $param_list = [
                    $proj_id,
                    $user_id,
                    $suggestion
                ];      
                return $this->push_record($sql,$param_type,$param_list);
    }
    public function get_discussions($pid){
        $sql ="SELECT * FROM `discussions`
                INNER JOIN `users`
                    ON  `users`.`user_id` = `discussions`.`user_id`
                INNER JOIN `projects`
                    ON  `projects`.`proj_id` = `discussions`.`proj_id`
                WHERE `discussions`.`proj_id` = ?
                ORDER BY `discussions`.`ds_id` ASC;";
                $param_type = "i";
                $param_list = [$pid];
                return $this->fetch_records_II($sql,$param_type,$param_list);
    }
    private function vw_discussion_even($discussion){
        echo '<div class="even-discuss">
                <div class="even-discuss-owner">
                    <span class="contributor-name">'.$discussion["fname"].' '.$discussion["lname"].'</span>
                </div>
                <div class="contributor-text">'.$discussion["suggestion"].'</div>
                <div class="contributor-timestamp">
                    <i class="fa fa-check"></i>
                    <i class="fa fa-check"></i>
                </div>
            </div>';
    }
    private function vw_discussion_odd($discussion){
        echo '<div class="odd-discuss-wrap">
                <div class="odd-discuss">
                    <div class="old-discuss-owner">
                        <span class="contributor-name">'.$discussion["fname"].' '.$discussion["lname"].'</span>
                    </div>
                    <div class="contributor-text">'.$discussion["suggestion"].'</div>
                    <div class="contributor-timestamp"><i class="fa fa-check"></i></div>
                </div>
            </div>';
    }
    public function vw_discussion($productsContainer){
        if(is_array($productsContainer) && !empty($productsContainer)){
            foreach($productsContainer As $discussion){
                if(($discussion["ds_id"]%2)==0)
                    $this->vw_discussion_even($discussion);
                else 
                    $this->vw_discussion_odd($discussion);
            }
        }else {
            echo '<h5 class="err_products">
                <i class="fa fa-robot"></i>
                <br>
                Start the conversation ......
            </h5>';
        }
    }
    public function add_attachment($o){
        $sql = "INSERT INTO `attachments`(`user_id`,`proj_id`,`file_name`,`file_type`,`file_size`,`file_path`)VALUES(?,?,?,?,?,?);";
                $param_type = "iissss";
                $param_list = [   
                    $o["user_id"],
                    $o["proj_id"],
                    $o["file_name"],
                    $o["file_type"],
                    $o["file_size"],
                    $o["file_path"]
                ];
                return $this->push_record($sql,$param_type,$param_list);        
    } 
    public function delete_project($proj_id,$user_id){
        $sql = "DELETE FROM `projects` 
                WHERE `projects`.`user_id` = ? 
                AND `projects`.`proj_id` = ?;";
                $param_type = "ii";
                $param_list = [
                    $user_id,
                    $proj_id
                ];
                return $this->drop_record($sql,$param_type,$param_list);
    }
    public function delete_project_pictures($proj_id,$a_id){
        $sql = "DELETE FROM `attachments` 
                WHERE `attachments`.`proj_id` = ? 
                AND `attachments`.`a_id` = ?;";
                $param_type = "ii";
                $param_list = [
                    $proj_id,
                    $a_id
                ];
                return $this->drop_record($sql,$param_type,$param_list);
    }
    public function fs_unlink($fs_url,$f_name){
        $unlink_url = $fs_url.$f_name;
        if(unlink($unlink_url))
            return true;
        else return false;
    }
    public function share($proj_id,$user_id){
        $status = 1;
        $sql = "INSERT INTO `filesharing`(`proj_id`,`user_id`,`status`)VALUES(?,?,?);";
                $param_type = "iii";               
                $param_list = [
                    $proj_id,
                    $user_id,
                    $status
                ];      
                return $this->push_record($sql,$param_type,$param_list);
    }
    public function register($o){
        $sql = "INSERT INTO `users`(`fname`,`lname`,`dob`,`gender`,`phone`,`email`,`address`,`password`)VALUES(?,?,?,?,?,?,?,?);";
                $param_type = "ssssssss";               
                $param_list = [
                    $o["fname"],
                    $o["lname"],
                    $o["dob"],
                    $o["gender"],
                    $o["phone"],
                    $o["email"],
                    $o["address"],
                    $o["password"]
                ];      
                return $this->push_record($sql,$param_type,$param_list);
    }
    public function update_password($o){
        $sql = "UPDATE `users`
                SET `users`.`password` = ?
                WHERE `users`.`email` = ?;";
                $param_type = "ss";               
                $param_list = [
                    $o["password"],
                    $o["email"]
                ];      
                return $this->push_record($sql,$param_type,$param_list);
    }
    private function get_stats_attachments($user_id){
        $sql ="SELECT COUNT(*) AS `total_attachments` FROM `attachments`
                WHERE `attachments`.`user_id` = ?;";
                $param_type = "i";
                $param_list = [
                    $user_id
                ];
                return $this->fetch_record_II($sql,$param_type,$param_list);
    }
    public function get_stats_discussions($user_id){
        $sql ="SELECT COUNT(*)  AS `total_discussions` FROM `discussions`
                WHERE `discussions`.`user_id` = ?;";
                $param_type = "i";
                $param_list = [
                    $user_id
                ];
                return $this->fetch_record_II($sql,$param_type,$param_list);
    }
    public function get_stats_filesharing($user_id){
        $sql ="SELECT COUNT(*)  AS `total_filesharing` FROM `filesharing`
                WHERE `filesharing`.`user_id` = ?;";
                $param_type = "i";
                $param_list = [
                    $user_id
                ];
                return $this->fetch_record_II($sql,$param_type,$param_list);
    }
    public function get_stats_tasts(){
        $sql ="SELECT COUNT(*)  AS `total_tasks` FROM `tasks`;";
               return $this->fetch_records($sql);
    }
    public function get_stats_milestones(){
        $sql ="SELECT COUNT(*)  AS `total_milestones` FROM `milestones`;";
               return $this->fetch_records($sql);
    }
    public function get_stats_projects($user_id){
        $sql ="SELECT COUNT(*)  AS `total_projects` FROM `projects`
                WHERE `projects`.`user_id` = ?;";
                $param_type = "i";
                $param_list = [
                    $user_id
                ];
                return $this->fetch_record_II($sql,$param_type,$param_list);
    }
    public function statistics($user_id){
        $stats = [];
        $stats["attachments"] = $this->get_stats_attachments($user_id);
        $stats["discussions"] = $this->get_stats_discussions($user_id);
        $stats["filesharing"] = $this->get_stats_filesharing($user_id);
        $stats["tasks"] = $this->get_stats_tasts();
        $stats["milestones"] = $this->get_stats_milestones();
        $stats["projects"] = $this->get_stats_projects($user_id);
        return $stats;
    }
    public function register_administrator($o){
        $sql = "INSERT INTO `users`(`fname`,`lname`,`dob`,`gender`,`phone`,`email`,`address`,`role`,`password`)VALUES(?,?,?,?,?,?,?,?,?);";
                $param_type = "sssssssss";               
                $param_list = [
                    $o["fname"],
                    $o["lname"],
                    $o["dob"],
                    $o["gender"],
                    $o["phone"],
                    $o["email"],
                    $o["address"],
                    $o["role"],
                    $o["password"]
                ];      
                return $this->push_record($sql,$param_type,$param_list);
    }
    public function adjust_account($user_id,$role){
        $sql = "UPDATE `users`
                SET `users`.`role` = ?
                WHERE `users`.`user_id` = ?;";
                $param_type = "ii";               
                $param_list = [
                    $role,
                    $user_id
                ];      
                return $this->push_record($sql,$param_type,$param_list);
    }
    public function delete_account($user_id){
        $sql = "DELETE FROM `users` 
                WHERE `users`.`user_id` = ?;";
                $param_type = "i";
                $param_list = [
                    $user_id
                ];
                return $this->drop_record($sql,$param_type,$param_list);
    }
    private function get_stats_attachments_a(){
        $sql ="SELECT COUNT(*) AS `total_attachments` FROM `attachments`;";
                return $this->fetch_records($sql);
    }
    public function get_stats_discussions_a(){
        $sql ="SELECT COUNT(*)  AS `total_discussions` FROM `discussions`;";
                return $this->fetch_records($sql);
    }
    public function get_stats_filesharing_a(){
        $sql ="SELECT COUNT(*)  AS `total_filesharing` FROM `filesharing`;";
                return $this->fetch_records($sql);
    }
    public function get_stats_tasts_a(){
        $sql ="SELECT COUNT(*)  AS `total_tasks` FROM `tasks`;";
               return $this->fetch_records($sql);
    }
    public function get_stats_milestones_a(){
        $sql ="SELECT COUNT(*)  AS `total_milestones` FROM `milestones`;";
               return $this->fetch_records($sql);
    }
    public function get_stats_projects_a(){
        $sql ="SELECT COUNT(*)  AS `total_projects` FROM `projects`;";
                return $this->fetch_records($sql);
    }
    public function statistics_a(){
        $stats = [];
        $stats["attachments"] = $this->get_stats_attachments_a();
        $stats["discussions"] = $this->get_stats_discussions_a();
        $stats["filesharing"] = $this->get_stats_filesharing_a();
        $stats["tasks"] = $this->get_stats_tasts_a();
        $stats["milestones"] = $this->get_stats_milestones_a();
        $stats["projects"] = $this->get_stats_projects_a();
        return $stats;
    }
}
?>