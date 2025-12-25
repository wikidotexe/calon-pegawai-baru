# Perumusan Algoritma TOPSIS

## Sistem Pendukung Keputusan Penerimaan Calon Pegawai Baru

---

## 📌 Pengertian TOPSIS

**TOPSIS** (_Technique for Order Preference by Similarity to Ideal Solution_) adalah metode pengambilan keputusan multikriteria yang didasarkan pada konsep bahwa alternatif terbaik adalah yang memiliki **jarak terdekat** dengan solusi ideal positif dan **jarak terjauh** dari solusi ideal negatif.

Metode ini pertama kali diperkenalkan oleh **Hwang dan Yoon** pada tahun 1981.

---

## 📊 Langkah-Langkah Algoritma TOPSIS

### **Langkah 1: Menyusun Matriks Keputusan**

Matriks keputusan **X** berisi nilai alternatif terhadap setiap kriteria.

$$
X = \begin{bmatrix}
x_{11} & x_{12} & \cdots & x_{1n} \\
x_{21} & x_{22} & \cdots & x_{2n} \\
\vdots & \vdots & \ddots & \vdots \\
x_{m1} & x_{m2} & \cdots & x_{mn}
\end{bmatrix}
$$

**Keterangan:**

-   $m$ = Jumlah alternatif (calon pegawai)
-   $n$ = Jumlah kriteria
-   $x_{ij}$ = Nilai alternatif ke-$i$ pada kriteria ke-$j$

**Contoh Implementasi:**
| Alternatif | C1 (Pengalaman) | C2 (Pendidikan) | C3 (Usia) | C4 (Tes) | C5 (Sikap) |
|------------|-----------------|-----------------|-----------|----------|------------|
| A1 | 4 | 3 | 2 | 4 | 3 |
| A2 | 3 | 4 | 3 | 3 | 4 |
| A3 | 5 | 3 | 4 | 5 | 4 |

---

### **Langkah 2: Normalisasi Matriks Keputusan (R)**

Normalisasi dilakukan untuk menyamakan skala nilai dari berbagai kriteria.

$$
r_{ij} = \frac{x_{ij}}{\sqrt{\sum_{i=1}^{m} x_{ij}^2}}
$$

**Keterangan:**

-   $r_{ij}$ = Nilai normalisasi alternatif ke-$i$ pada kriteria ke-$j$
-   $x_{ij}$ = Nilai asli alternatif ke-$i$ pada kriteria ke-$j$

**Implementasi dalam Kode:**

```php
// Menghitung pembagi (akar dari jumlah kuadrat)
$hitungMatriks = 0;
foreach ($penilaianKriteria as $value) {
    $hitungMatriks += pow($value->subKriteria->nilai, 2);
}
$hitungMatriks = sqrt($hitungMatriks);

// Menghitung nilai normalisasi
$matriksNormalisasi = $value->subKriteria->nilai / $matriksKeputusan->nilai;
```

**Contoh Perhitungan:**

Untuk kriteria C1:

$$
\sqrt{4^2 + 3^2 + 5^2} = \sqrt{16 + 9 + 25} = \sqrt{50} = 7.071
$$

| Alternatif | r₁ (C1)         |
| ---------- | --------------- |
| A1         | 4/7.071 = 0.566 |
| A2         | 3/7.071 = 0.424 |
| A3         | 5/7.071 = 0.707 |

---

### **Langkah 3: Matriks Keputusan Ternormalisasi Terbobot (Y)**

Mengalikan matriks ternormalisasi dengan bobot kriteria.

$$
y_{ij} = w_j \times r_{ij}
$$

**Keterangan:**

-   $y_{ij}$ = Nilai terbobot alternatif ke-$i$ pada kriteria ke-$j$
-   $w_j$ = Bobot kriteria ke-$j$
-   $r_{ij}$ = Nilai normalisasi

**Syarat Bobot:**

$$
\sum_{j=1}^{n} w_j = 1
$$

**Implementasi dalam Kode:**

```php
$matriksY = $value->nilai * $bobotKriteria->bobot;
```

**Contoh Bobot Kriteria:**
| Kriteria | Nama | Bobot (w) |
|----------|------|-----------|
| C1 | Pengalaman Kerja | 0.25 |
| C2 | Pendidikan | 0.20 |
| C3 | Usia | 0.15 |
| C4 | Tes Tertulis | 0.25 |
| C5 | Sikap | 0.15 |
| **Total** | | **1.00** |

---

### **Langkah 4: Menentukan Solusi Ideal Positif (A⁺) dan Negatif (A⁻)**

**Solusi Ideal Positif (A⁺):** Nilai terbaik dari setiap kriteria

$$
A^+ = \{y_1^+, y_2^+, \ldots, y_n^+\}
$$

$$
y_j^+ = \max_i(y_{ij})
$$

**Solusi Ideal Negatif (A⁻):** Nilai terburuk dari setiap kriteria

$$
A^- = \{y_1^-, y_2^-, \ldots, y_n^-\}
$$

$$
y_j^- = \min_i(y_{ij})
$$

**Implementasi dalam Kode:**

```php
// Dapatkan nilai maksimum (ideal positif)
$maxItem = $solusiIdealKriteria->sortByDesc('nilai')->first();

// Dapatkan nilai minimum (ideal negatif)
$minItem = $solusiIdealKriteria->sortBy('nilai')->first();
```

**Contoh:**
| Kriteria | A⁺ (Max) | A⁻ (Min) |
|----------|----------|----------|
| C1 | 0.177 | 0.106 |
| C2 | 0.160 | 0.120 |
| C3 | 0.085 | 0.042 |
| C4 | 0.177 | 0.106 |
| C5 | 0.085 | 0.064 |

---

### **Langkah 5: Menghitung Jarak ke Solusi Ideal**

**Jarak ke Solusi Ideal Positif (D⁺):**

$$
D_i^+ = \sqrt{\sum_{j=1}^{n} (y_{ij} - y_j^+)^2}
$$

**Jarak ke Solusi Ideal Negatif (D⁻):**

$$
D_i^- = \sqrt{\sum_{j=1}^{n} (y_{ij} - y_j^-)^2}
$$

**Implementasi dalam Kode:**

```php
foreach ($kriterias as $krit) {
    // Hitung selisih jarak kuadrat ke ideal positif & negatif
    $jarakPositifSi += pow($nilaiY->nilai - $idealP->nilai, 2);
    $jarakNegatifSi += pow($nilaiY->nilai - $idealN->nilai, 2);
}

// Hitung akar jarak
$sqrtPositif = sqrt($jarakPositifSi);  // D+
$sqrtNegatif = sqrt($jarakNegatifSi);  // D-
```

**Contoh Perhitungan D⁺ untuk A1:**

$$
D_1^+ = \sqrt{(0.141-0.177)^2 + (0.120-0.160)^2 + \ldots}
$$

---

### **Langkah 6: Menghitung Nilai Preferensi (V)**

Nilai preferensi menentukan ranking alternatif.

$$
V_i = \frac{D_i^-}{D_i^+ + D_i^-}
$$

**Keterangan:**

-   $V_i$ = Nilai preferensi alternatif ke-$i$
-   $D_i^+$ = Jarak ke solusi ideal positif
-   $D_i^-$ = Jarak ke solusi ideal negatif
-   **Semakin besar nilai $V_i$, semakin baik alternatif tersebut**

**Implementasi dalam Kode:**

```php
$hitung = [
    'alternatif_id' => $item['alternatif_id'],
    'nilai' => $value['nilai'] / ($item['nilai'] + $value['nilai']),
    // V = D- / (D+ + D-)
];
```

**Contoh Hasil:**
| Alternatif | D⁺ | D⁻ | V = D⁻/(D⁺+D⁻) | Ranking |
|------------|-----|-----|----------------|---------|
| A1 | 0.089 | 0.045 | 0.336 | 3 |
| A2 | 0.067 | 0.056 | 0.455 | 2 |
| A3 | 0.023 | 0.098 | 0.810 | 1 |

---

## 📈 Flowchart Algoritma TOPSIS

```
                    ┌─────────────────────────┐
                    │         START           │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  Input Data Alternatif  │
                    │  & Nilai Kriteria       │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  LANGKAH 1:             │
                    │  Susun Matriks          │
                    │  Keputusan (X)          │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  LANGKAH 2:             │
                    │  Normalisasi Matriks    │
                    │  r = x / √(Σx²)         │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  LANGKAH 3:             │
                    │  Matriks Terbobot       │
                    │  Y = w × r              │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  LANGKAH 4:             │
                    │  Tentukan Ideal         │
                    │  A⁺ = max(Y)            │
                    │  A⁻ = min(Y)            │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  LANGKAH 5:             │
                    │  Hitung Jarak           │
                    │  D⁺ = √Σ(Y - A⁺)²       │
                    │  D⁻ = √Σ(Y - A⁻)²       │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  LANGKAH 6:             │
                    │  Nilai Preferensi       │
                    │  V = D⁻ / (D⁺ + D⁻)     │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  Ranking Berdasarkan    │
                    │  Nilai V (Descending)   │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │  Tentukan Status:       │
                    │  50% teratas = DITERIMA │
                    │  50% terbawah = DITOLAK │
                    └───────────┬─────────────┘
                                │
                                ▼
                    ┌─────────────────────────┐
                    │          END            │
                    └─────────────────────────┘
```

---

## 🔢 Contoh Perhitungan Lengkap

### Data Input

**Kriteria dan Bobot:**
| Kode | Kriteria | Bobot |
|------|----------|-------|
| C1 | Pengalaman Kerja | 0.25 |
| C2 | Pendidikan | 0.20 |
| C3 | Usia | 0.15 |
| C4 | Hasil Tes | 0.25 |
| C5 | Sikap | 0.15 |

**Data Alternatif (Matriks X):**
| Alternatif | C1 | C2 | C3 | C4 | C5 |
|------------|----|----|----|----|-----|
| A1 (Budi) | 4 | 3 | 2 | 4 | 3 |
| A2 (Ani) | 3 | 4 | 3 | 3 | 4 |
| A3 (Citra) | 5 | 3 | 4 | 5 | 4 |

### Langkah 1: Pembagi Normalisasi

$$
|C_1| = \sqrt{4^2 + 3^2 + 5^2} = \sqrt{50} = 7.071
$$

$$
|C_2| = \sqrt{3^2 + 4^2 + 3^2} = \sqrt{34} = 5.831
$$

$$
|C_3| = \sqrt{2^2 + 3^2 + 4^2} = \sqrt{29} = 5.385
$$

$$
|C_4| = \sqrt{4^2 + 3^2 + 5^2} = \sqrt{50} = 7.071
$$

$$
|C_5| = \sqrt{3^2 + 4^2 + 4^2} = \sqrt{41} = 6.403
$$

### Langkah 2: Matriks Normalisasi (R)

| Alternatif | r₁    | r₂    | r₃    | r₄    | r₅    |
| ---------- | ----- | ----- | ----- | ----- | ----- |
| A1         | 0.566 | 0.514 | 0.371 | 0.566 | 0.468 |
| A2         | 0.424 | 0.686 | 0.557 | 0.424 | 0.625 |
| A3         | 0.707 | 0.514 | 0.743 | 0.707 | 0.625 |

### Langkah 3: Matriks Terbobot (Y = R × W)

| Alternatif | y₁    | y₂    | y₃    | y₄    | y₅    |
| ---------- | ----- | ----- | ----- | ----- | ----- |
| A1         | 0.141 | 0.103 | 0.056 | 0.141 | 0.070 |
| A2         | 0.106 | 0.137 | 0.084 | 0.106 | 0.094 |
| A3         | 0.177 | 0.103 | 0.111 | 0.177 | 0.094 |

### Langkah 4: Solusi Ideal

| Kriteria | A⁺ (Max) | A⁻ (Min) |
| -------- | -------- | -------- |
| C1       | 0.177    | 0.106    |
| C2       | 0.137    | 0.103    |
| C3       | 0.111    | 0.056    |
| C4       | 0.177    | 0.106    |
| C5       | 0.094    | 0.070    |

### Langkah 5: Jarak ke Solusi Ideal

**D⁺ (Jarak ke Ideal Positif):**

$$
D_1^+ = \sqrt{(0.141-0.177)^2 + (0.103-0.137)^2 + (0.056-0.111)^2 + (0.141-0.177)^2 + (0.070-0.094)^2} = 0.089
$$

$$
D_2^+ = 0.067
$$

$$
D_3^+ = 0.023
$$

**D⁻ (Jarak ke Ideal Negatif):**

$$
D_1^- = 0.045
$$

$$
D_2^- = 0.056
$$

$$
D_3^- = 0.098
$$

### Langkah 6: Nilai Preferensi & Ranking

| Alternatif | D⁺    | D⁻    | V         | Ranking | Status      |
| ---------- | ----- | ----- | --------- | ------- | ----------- |
| A3 (Citra) | 0.023 | 0.098 | **0.810** | 1       | ✅ DITERIMA |
| A2 (Ani)   | 0.067 | 0.056 | **0.455** | 2       | ✅ DITERIMA |
| A1 (Budi)  | 0.089 | 0.045 | **0.336** | 3       | ❌ DITOLAK  |

---

## 📝 Pseudocode Algoritma TOPSIS

```
ALGORITHM TOPSIS
INPUT:
    alternatif[1..m]      // m alternatif
    kriteria[1..n]        // n kriteria dengan bobot w[j]
    nilai[i][j]           // nilai alternatif i pada kriteria j

OUTPUT:
    ranking[]             // ranking alternatif berdasarkan nilai preferensi

BEGIN
    // LANGKAH 1: Matriks Keputusan
    FOR j = 1 TO n DO
        pembagi[j] = 0
        FOR i = 1 TO m DO
            pembagi[j] = pembagi[j] + nilai[i][j]^2
        END FOR
        pembagi[j] = SQRT(pembagi[j])
    END FOR

    // LANGKAH 2: Normalisasi
    FOR i = 1 TO m DO
        FOR j = 1 TO n DO
            R[i][j] = nilai[i][j] / pembagi[j]
        END FOR
    END FOR

    // LANGKAH 3: Matriks Terbobot
    FOR i = 1 TO m DO
        FOR j = 1 TO n DO
            Y[i][j] = w[j] * R[i][j]
        END FOR
    END FOR

    // LANGKAH 4: Solusi Ideal
    FOR j = 1 TO n DO
        A_positif[j] = MAX(Y[1..m][j])
        A_negatif[j] = MIN(Y[1..m][j])
    END FOR

    // LANGKAH 5: Jarak ke Solusi Ideal
    FOR i = 1 TO m DO
        D_positif[i] = 0
        D_negatif[i] = 0
        FOR j = 1 TO n DO
            D_positif[i] = D_positif[i] + (Y[i][j] - A_positif[j])^2
            D_negatif[i] = D_negatif[i] + (Y[i][j] - A_negatif[j])^2
        END FOR
        D_positif[i] = SQRT(D_positif[i])
        D_negatif[i] = SQRT(D_negatif[i])
    END FOR

    // LANGKAH 6: Nilai Preferensi
    FOR i = 1 TO m DO
        V[i] = D_negatif[i] / (D_positif[i] + D_negatif[i])
    END FOR

    // Ranking (descending by V)
    ranking = SORT_DESC(alternatif, BY V)

    // Tentukan Status (50% teratas = Diterima)
    batas = CEIL(m / 2)
    FOR i = 1 TO m DO
        IF ranking[i] <= batas THEN
            status[i] = "DITERIMA"
        ELSE
            status[i] = "DITOLAK"
        END IF
    END FOR

    RETURN ranking, V, status
END
```

---

## 🔍 Kompleksitas Algoritma

| Operasi                    | Kompleksitas           |
| -------------------------- | ---------------------- |
| Menyusun Matriks Keputusan | O(m × n)               |
| Normalisasi                | O(m × n)               |
| Matriks Terbobot           | O(m × n)               |
| Solusi Ideal               | O(m × n)               |
| Jarak ke Solusi Ideal      | O(m × n)               |
| Nilai Preferensi           | O(m)                   |
| Sorting/Ranking            | O(m log m)             |
| **Total**                  | **O(m × n + m log m)** |

**Keterangan:**

-   m = Jumlah alternatif (calon pegawai)
-   n = Jumlah kriteria

---

## ✅ Kelebihan Metode TOPSIS

1. **Konsep sederhana** dan mudah dipahami
2. **Proses komputasi efisien** dengan kompleksitas rendah
3. **Mempertimbangkan solusi ideal** positif dan negatif
4. **Menghasilkan ranking** yang jelas dan terukur
5. **Fleksibel** untuk berbagai jenis kriteria

## ⚠️ Keterbatasan Metode TOPSIS

1. Membutuhkan **penentuan bobot** yang tepat
2. Semua kriteria dianggap **independen**
3. Sensitif terhadap **perubahan bobot**

---

## 📚 Referensi

1. Hwang, C.L., & Yoon, K. (1981). _Multiple Attribute Decision Making: Methods and Applications_. Springer-Verlag.
2. Yoon, K.P., & Hwang, C.L. (1995). _Multiple Attribute Decision Making: An Introduction_. Sage Publications.

---

_Dokumen ini dibuat untuk keperluan dokumentasi Tugas Akhir_
_Sistem Pendukung Keputusan Penerimaan Calon Pegawai Baru - PT Lizzie Parra Kreasi_
