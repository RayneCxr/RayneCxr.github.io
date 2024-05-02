package stokBarang;

import java.util.Set;
import java.util.HashSet;

public final class BarangHabisPakai extends Barang {
    private static final Set<BarangHabisPakai> BarangHabisPakaiList = new HashSet<>();

    public BarangHabisPakai(final int kodeBarang, final String namaBarang, final int stokAwal, final int barangMasuk, final int barangKeluar, final String keterangan) {
        super(kodeBarang, namaBarang, stokAwal, barangMasuk, barangKeluar, keterangan);
        BarangHabisPakaiList.add(this);
    }

    public static Set<BarangHabisPakai> getBarangHabisPakaiList() {
        return BarangHabisPakaiList;
    }

    @Override
    public String getJenisBarang() {
        return "Barang Habis Pakai";
    }

    public int getkodeBarang() {
        return this.kodeBarang;
    }

}
