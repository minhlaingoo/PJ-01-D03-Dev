import './bootstrap';
import './darkmode';

if(!localStorage.getItem('mijnuiActiveContent')){
    localStorage.setItem('mijnuiActiveContent', 'dashboard');
}
