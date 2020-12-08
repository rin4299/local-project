$dbName = 'test_creator'

# Model - File

## index.php
Khi truy cập lần đầu vào web thì luôn được vào index.php. 
Vậy trang này define các url trong web này. Khi vào web với url nào thì các tác vụ đc thực hiện
- Nếu các trang có chung thành phần với nhau thì add vào theo dạng regex.
    + /$: end-of-line chỉ là / (truy cập vào index.php)
- Cách add 1 route url đc hd ở phần dưới

## Router.php
Đây là class Router dùng để direct trang web theo url của mình. 

CẤM AI SỬA BẤT KỲ THỨ GÌ TRONG FILE NÀY.

chỉ cần quan tầm hàm addRoute():
- Truyền 2 tham số là:
    + Kiểu url sẽ đc direct
    + Hàm sẽ thực thi khi direct sang trang này

## View
- Viết tất cả bằng PHP 
- Hiện tại thì phía frontend sẽ thiết kế ra khung view trước. Còn các phần load động thì để data giả vào
- Khi nào backend xong thì ghép các hàm từ backend vào vị trí data giả đó

## Controller
- 1 controller thì nên theo 1 view. Hoặc 1 nhóm chức năng thì trong 1 controller
- Hàm view() bao gồm việc gán các data, session, cookie vào header của HTTP method.
- Nếu trang này dùng GET method thì làm tương tự như trên 
- Nếu dùng POST cho php này (như php handles form) thì sửa lại:
    + file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Assignment/view/view.php', false, $stream);
    + Bỏ phần concat string ở url

# Zoom meeting
- Login page first
- List question page:
    - ID, Content (4 words), created_by, edit, delete, add
    - Add button: add question id to session
- Make test:
    - Client sends session data to backend
    - Backend returns pdf file
- Random generate:
    - On right side of problems view
    - Fields: Subject, number of questions, difficulty

- DB:
    - Question table: add created_by 

# Timeline (to 14-11-2020)
- Front: Finish view of login, main page, problems view 
  + Problems view: Just a structure view with no need function call yet
- Back: Finish model (function call) for login, create user, add problems, edit problems, return problem list
  + Bao: implement login, create user 
  + Vu: return problem list (as order of created_by at top)
  + Nhan: add/edit problem

## Research:
  - Front: how to retrieve/assign values in Session
  - Bao/Vu: how to retrieve/assign values in Session
  => Basic user's data is used accross the site (Show username, permission at header)
  - Nhan: how to auto-save html page to pdf

-----------------------------------------------
  ## Note Saturday 14 Nov 2020
  Thông: Code UI
  - Add Question: 
  + Sửa từ Correct/Other -> A B C D + Radio select Correct Answer
  - Account Settings: View username + Change Password
  - Dashboard
  - Manage User

  Trí + Bảo: 
  - Done Login
  + Hiện tên User
  - Done Logout
  - Done change password

  Nhân:
  - Add câu hỏi

------
  - Add câu hỏi = session
  - Add câu hỏi random
  - Manage User


    ## Note Saturday 22 Nov 2020
  Thông: Code UI
  - Fix CSS Import
  - Fix field Question ID 
  - Work with Vũ and Trí Question View
  - Question View: Question -> Question ID
  - Button Make Random Exam 
  - Make Random Question:
    - All Category
    - All Difficulty
  - Dashboard
  
  Thằng Nhân:
  - Làm cái Add Question và sửa cái Dashboard


  Vũ:
  - Question List
  
  Bảo:
  - Create new SQL file
  
  Trí:
  - Question View with Thông + Vũ

