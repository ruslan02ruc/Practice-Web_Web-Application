<?php
class StudentMap extends BaseMap{
    function findById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT user_id, gruppa_id FROM Student WHERE user_id = $id");
            $student = $res->fetchObject("Student");
            if ($student) {
                return $student;
            }
        }
    }
    function save(User $user, Student $student, Student $num_zach)
    {
        if ($user->validate() && $student->validate() && $num_zach->validate() && (new UserMap())->save($user)) {
            if ($student->user_id == 0) {
                $student->user_id = $user->user_id;
                return $this->insert($student);
            } else {
                return $this->update($student);
            }
        }
    }
    private function insert(Student $student)
    {
        if ($this->db->exec("INSERT INTO student(user_id, gruppa_id, num_zach) VALUES('$student->user_id', '$student->gruppa_id', '$num_zach->num_zach')") == 1) {
            return true;
        }
        return false;
    }
    private function update(Student $student)
    {
        if ($this->db->exec("UPDATE student SET gruppa_id = $student->gruppa_id WHERE user_id=" . $student->user_id) == 1) {
            return true;
        }
        return false;
    }
    function findAll($ofset = 0, $limit = 30)
    {
        $res = $this->db->query("SELECT user.user_id, CONCAT(user.lastname,' ', user.firstname, ' ', user.patronymic) AS fio, user.birthday, " . " gender.name AS gender, gruppa.name AS gruppa, role.name AS role FROM user INNER JOIN student ON user.user_id=student.user_id " . "INNER JOIN gender ON user.gender_id=gender.gender_id INNER JOIN gruppa ON student.gruppa_id=gruppa.gruppa_id" . " INNER JOIN role ON user.role_id=role.role_id LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM student");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    function findProfileById($id = NULL)
    {
        if ($id) {
            $res = $this->db->query("SELECT student.user_id,gruppa.name AS gruppa FROM student  " . "INNER JOIN gruppa ON student.gruppa_id=gruppa.gruppa_id  WHERE student.user_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
