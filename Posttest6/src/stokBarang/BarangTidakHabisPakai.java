package stokBarang;

import java.util.Set;
import java.util.HashSet;

public final class BarangTidakHabisPakai extends Barang {
    private static final Set<BarangTidakHabisPakai> BarangTidakHabisPakaiList = new HashSet<>();

    public BarangTidakHabisPakai(final int kodeBarang, final String namaBarang, final int stokAwal, final int barangMasuk, final int barangKeluar, final String keterangan) {
        super(kodeBarang, namaBarang, stokAwal, barangMasuk, barangKeluar, keterangan);
        BarangTidakHabisPakaiList.add(this);
    }

    public static Set<BarangTidakHabisPakai> getBarangTidakHabisPakaiList() {
        return BarangTidakHabisPakaiList;
    }

    @Override
    public String getJenisBarang() {
        return "Barang Tidak Habis Pakai";
    }

    public int getkodeBarang() {
        return this.kodeBarang;
    }
}
