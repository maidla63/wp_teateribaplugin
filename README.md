# WordPressi teateriba plugin

## 🛠️ Mida see plugin teeb?
Plugin lisab WordPressi admin-paneeli eraldi seadete lehe (" teateriba"), kus saab reaalajas muuta veebilehel kuvatavat teadet.

**Põhilised funktsioonid:**
* **Dünaamiline tekst:** Sisesta täpselt see teade, mida soovid külastajatele kuvada.
* **Värvihaldus:** Saad ise valida nii riba taustavärvi kui ka teksti värvi (kasutades värvivalijat).
* **Kuvamise loogika:** Võimalus lülitada riba sisse ainult avalehel või näidata seda igal pool.
* **Kasutajasõbralik:** Lisasin JavaScripti põhise "X" nupu, et külastaja saaks teate kinni panna, kui see teda segab.

## 🚀 Paigaldamine
1. Kloonisin selle repositooriumi oma Ubuntu serveri `/wp-content/plugins/` kataloogi.
2. Andsin veebiserverile (`www-data`) vajalikud õigused kausta haldamiseks.
3. Aktiveerisin plugina WordPressi admin-paneelist "Pluginad" alt.

## 📁 Failid
* `teateriba.php` – Kogu plugina loogika, admin-liides ja CSS/JS kuvamine.
* `README.md` – See sama dokument siin.
