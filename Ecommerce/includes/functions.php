<?php
// Shared security, session, and store helpers.
function e($value){ return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function url($path=''){ return rtrim(BASE_URL,'/').'/'.ltrim($path,'/'); }
function csrf(){ if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function verify_csrf(){ if(!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) { http_response_code(419); exit('Invalid request token. Please try again.'); } }
function logged_in(){ return isset($_SESSION['user']); }
function admin_in(){ return isset($_SESSION['admin']); }
function require_login(){ if(!logged_in()){ $_SESSION['flash']='Please sign in to continue.'; header('Location: '.url('login.php')); exit; } }
function cart_count(){ return array_sum($_SESSION['cart'] ?? []); }
function money($amount){ return '₹'.number_format((float)$amount, 2); }
function flash(){ if(!empty($_SESSION['flash'])){ echo '<div class="alert alert-success alert-dismissible fade show shadow-sm">'.e($_SESSION['flash']).'<button class="btn-close" data-bs-dismiss="alert"></button></div>'; unset($_SESSION['flash']); } }
function products($pdo, $limit=0, $where='1=1', $args=[]){ if(!$pdo)return []; $sql="SELECT p.*,c.name category_name FROM products p JOIN categories c ON c.id=p.category_id WHERE $where ORDER BY p.created_at DESC".($limit?' LIMIT '.(int)$limit:''); $q=$pdo->prepare($sql); $q->execute($args); return $q->fetchAll(); }
?>
