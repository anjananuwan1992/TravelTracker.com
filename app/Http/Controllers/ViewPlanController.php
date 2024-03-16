<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Models\Business;
use App\Models\package;
use App\Models\Admin;
use App\Models\Attraction;
use App\Models\Tour;
use Session;
use DB;

class ViewPlanController extends Controller
{
    public function viewPlan(Request $request)
    {
        // Retrieve parameters from the URL
        $A = $request->input('A');
        $A1 = $request->input('A1');
        $B = $request->input('B');
        $B1 = $request->input('B1');
        $C = $request->input('C');
        $C1 = $request->input('C1');
        $D = $request->input('D');
        $D1 = $request->input('D1');
        $E = $request->input('E');
        $E1 = $request->input('E1');
        $F = $request->input('F');
        $F1 = $request->input('F1');
        $G = $request->input('G');
        $G1 = $request->input('G1');
        $H = $request->input('H');
        $H1 = $request->input('H1');
        $I = $request->input('I');
        $I1 = $request->input('I1');
        $J = $request->input('J');
        $J1 = $request->input('J1');
        $K = $request->input('K');
        $K1 = $request->input('K1');
        $L = $request->input('L');
        $L1 = $request->input('L1');
        $M = $request->input('M');
        $M1 = $request->input('M1');
        $N = $request->input('N');
        $N1 = $request->input('N1');
        $O = $request->input('O');
        $O1 = $request->input('O1');
        $P = $request->input('P');
        $P1 = $request->input('P1');
        $Q = $request->input('Q');
        $Q1 = $request->input('Q1');
        $R = $request->input('R');
        $R1 = $request->input('R1');
        $S = $request->input('S');
        $S1 = $request->input('S1');
        $T = $request->input('T');
        $T1 = $request->input('T1');
        $U = $request->input('U');
        $U1 = $request->input('U1');
        $V = $request->input('V');
        $V1 = $request->input('V1');
        $W = $request->input('W');
        $W1 = $request->input('W1');
        $X = $request->input('X');
        $X1 = $request->input('X1');
        $Y = $request->input('Y');
        $Y1 = $request->input('Y1');
        $Z = $request->input('Z');
        $Z1 = $request->input('Z1');
        $a = $request->input('a');
        $a1 = $request->input('a1');
        $b = $request->input('b');
        $b1 = $request->input('b1');
        $c = $request->input('c');
        $c1 = $request->input('c1');
        $d = $request->input('d');
        $d1 = $request->input('d1');
        $z = $request->input('z');
        $z1 = $request->input('z1');
        $f = $request->input('f');
        $f1 = $request->input('f1');
        $g = $request->input('g');
        $g1 = $request->input('g1');
        $h = $request->input('h');
        $h1 = $request->input('h1');
        $j = $request->input('j');
        $j1 = $request->input('j1');
        $k = $request->input('k');
        $k1 = $request->input('k1');
        $l = $request->input('l');
        $l1 = $request->input('l1');
        $m = $request->input('m');
        $m1 = $request->input('m1');
        $n = $request->input('n');
        $n1 = $request->input('n1');
        $o = $request->input('o');
        $o1 = $request->input('o1');
        $p = $request->input('p');
        $p1 = $request->input('p1');
        $q = $request->input('q');
        $q1 = $request->input('q1');
        $r = $request->input('r');
        $r1 = $request->input('r1');
        $s = $request->input('s');
        $s1 = $request->input('s1');
        $t = $request->input('t');
        $t1 = $request->input('t1');
        $u = $request->input('u');
        $u1 = $request->input('u1');
        $v = $request->input('v');
        $v1 = $request->input('v1');
        $w = $request->input('w');
        $w1 = $request->input('w1');
        $x = $request->input('x');
        $x1 = $request->input('x1');
        $y = $request->input('y');
        $y1 = $request->input('y1');
        $A2 = $request->input('A2');
        $B2 = $request->input('B2');
        $C2 = $request->input('C2');
        $D2 = $request->input('D2');
        $E2 = $request->input('E2');
        $F2 = $request->input('F2');
        $G2 = $request->input('G2');
        $H2 = $request->input('H2');
        $I2 = $request->input('I2');
        $J2 = $request->input('J2');
        $K2 = $request->input('K2');
        $L2 = $request->input('L2');
        $M2 = $request->input('M2');
        $N2 = $request->input('N2');
        $O2 = $request->input('O2');
        $P2 = $request->input('P2');
        $Q2 = $request->input('Q2');
        $R2 = $request->input('R2');
        $S2 = $request->input('S2');
        $T2 = $request->input('T2');
        $U2 = $request->input('U2');
        $V2 = $request->input('V2');
        $W2 = $request->input('W2');
        $X2 = $request->input('X2');
        $Y2 = $request->input('Y2');
        $Z2 = $request->input('Z2');
        $a2 = $request->input('a2');
        $b2 = $request->input('b2');
        $c2 = $request->input('c2');
        $d2 = $request->input('d2');
        $z2 = $request->input('z2');
        $f2 = $request->input('f2');
        $g2 = $request->input('g2');
        $h2 = $request->input('h2');
        $j2 = $request->input('j2');
        $k2 = $request->input('k2');
        $l2 = $request->input('l2');
        $m2 = $request->input('m2');
        $n2 = $request->input('n2');
        $o2 = $request->input('o2');
        $p2 = $request->input('p2');
        $q2 = $request->input('q2');
        $r2 = $request->input('r2');
        $s2 = $request->input('s2');
        $t2 = $request->input('t2');
        $u2 = $request->input('u2');
        $v2 = $request->input('v2');
        $w2 = $request->input('w2');
        $x2 = $request->input('x2');
        $y2 = $request->input('y2');

        $businesses = DB::table('businesses')->get();

        
        // Retrieve more parameters for C, C1, D, D1, etc.

        // You can pass these values to the view if needed
        return view('view-plan', compact('A', 'A1', 'B', 'B1', 'C', 'C1', 'D', 'D1','E', 'E1', 'F', 'F1','G', 'G1', 'H', 'H1', 'I', 'I1', 'J', 'J1', 
        'K', 'K1', 'L', 'L1', 'M', 'M1', 'N', 'N1', 'O', 'O1', 'P', 'P1', 'Q','Q1','R', 'R1', 'S', 'S1', 'T', 'T1', 
        'U', 'U1','V', 'V1', 'W', 'W1', 'X', 'X1', 'Y', 'Y1','Z', 'Z1', 'a', 'a1','b', 'b1', 'c', 'c1', 'd', 'd1', 
        'z', 'z1', 'f', 'f1', 'g', 'g1', 'h', 'h1', 'j', 'j1', 'k', 'k1', 'l', 'l1', 'm','m1','n', 'n1', 'o', 'o1',
         'p', 'p1', 'q', 'q1', 'r', 'r1', 's', 's1', 't', 't1', 'u', 'u1', 'v', 'v1', 'w','w1','x', 'x1', 'y', 'y1',
         'A2', 'B2', 'C2', 'D2', 'E2','F2','G2','H2','I2','J2','K2','L2','M2','N2','O2','P2','Q2','R2','S2','T2','U2','V2','W2','X2','Y2','Z2',
        'a2','b2','c2','d2','z2','f2','g2','h2','j2','k2','l2','m2','n2','o2','p2','q2','r2','s2','t2','u2','v2','w2','x2','y2', 'businesses'));
    }
}
