package stokBarang;

import java.util.HashSet;
import java.util.Set;

public abstract class Barang {
    private static int counter = 1;
    protected final int nomor;
    protected final Integer kodeBarang;
    protected final String namaBarang;
    protected final int stokAwal;
    protected int stokAkhir;
    protected int barangMasuk;
    protected int barangKeluar;
    protected String keterangan;

    protected static final Set<Integer> kodeBarangSet = new HashSet<>();

    public Barang(final Integer kodeBarang, final String namaBarang, final int stokAwal, final int barangMasuk, final int barangKeluar, final String keterangan) {
        this.nomor = counter++;
        this.kodeBarang = kodeBarang;
        this.namaBarang = namaBarang;
        this.stokAwal = stokAwal;
        this.barangMasuk = barangMasuk;
        this.barangKeluar = barangKeluar;
        this.keterangan = keterangan;
        this.stokAkhir = stokAwal + barangMasuk - barangKeluar;

        kodeBarangSet.add(kodeBarang);
    }

    public static Set<Integer> getKodeBarangSet() {
        return kodeBarangSet;
    }

    public int getNomor() {
        return nomor;
    }

    public int getKodeBarang() {
        return kodeBarang;
    }

    public String getNamaBarang() {
        return namaBarang;
    }

    public int getStokAwal() {
        return stokAwal;
    }

    public int getStokAkhir() {
        return stokAkhir;
    }

    public int getBarangMasuk() {
        return barangMasuk;
    }

    public int getBarangKeluar() {
        return barangKeluar;
    }

    public String getKeterangan() {
        return keterangan;
    }

    public abstract String getJenisBarang();

    public void setBarangMasuk(int barangMasuk) {
        this.barangMasuk = barangMasuk;
        this.stokAkhir = this.stokAwal + this.barangMasuk - this.barangKeluar;
    }

    public void setBarangKeluar(int barangKeluar) {
        this.barangKeluar = barangKeluar;
        this.stokAkhir = this.stokAwal + this.barangMasuk - this.barangKeluar;
    }

    public void setStokAkhir(int stokAkhir) {
        this.stokAkhir = stokAkhir;
    }

    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
    }
}