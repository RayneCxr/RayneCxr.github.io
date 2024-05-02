package stokBarang;

import java.util.ArrayList;
import java.util.Scanner;

public final class Main implements StokBarangInterface {
    private static final Scanner scanner = new Scanner(System.in);

    public static void main(final String[] args) {
        Main main = new Main();
        boolean isRunning = true;
        while (isRunning) {
            System.out.println("========================================");
            System.out.println("----------------------------------------");
            System.out.println("Menu:");
            System.out.println("----------------------------------------");
            System.out.println("\n1. Kelola Stok Barang Habis Pakai");
            System.out.println("\n2. Kelola Stok Barang Tidak Habis Pakai");
            System.out.println("\n3. Lihat Semua Stok Barang");
            System.out.println("\n4. Keluar");
            System.out.println("----------------------------------------");
            System.out.println("========================================");
            System.out.print("Pilih menu: ");
    
            try {
                if (scanner.hasNextInt()) {
                    int choice = scanner.nextInt();
                    scanner.nextLine();
    
                    switch (choice) {
                        case 1:
                            main.menuBarangHabisPakai();
                            break;
                        case 2:
                            main.menuBarangTidakHabisPakai();
                            break;
                        case 3:
                            main.lihatSemuaBarang();
                            break;
                        case 4:
                            isRunning = false;
                            System.out.println("Terima kasih!");
                            break;
                        default:
                            System.out.println("Pilihan tidak valid!");
                    }
                } else {
                    System.out.println("Input tidak valid. Harap masukkan angka.");
                    scanner.nextLine();
                }
            } catch (Exception e) {
                System.out.println("Terjadi kesalahan: " + e.getMessage());
            }
        }
    }
    
    @Override
    public void menuBarangHabisPakai() {
        boolean isRunning = true;
        while (isRunning) {
            System.out.println("========================================");
            System.out.println("----------------------------------------");
            System.out.println("Menu Stok Barang Habis Pakai:");
            System.out.println("----------------------------------------");
            System.out.println("\n1. Tambah Stok Barang");
            System.out.println("\n2. Lihat Semua Stok Barang");
            System.out.println("\n3. Ubah Stok Barang");
            System.out.println("\n4. Hapus Stok Barang");
            System.out.println("\n5. Kembali ke Menu Utama");
            System.out.println("----------------------------------------");
            System.out.println("========================================");
            System.out.print("Pilih menu: ");

            try {
                if (scanner.hasNextInt()) {
                    int choice = scanner.nextInt();
                    scanner.nextLine();

                    switch (choice) {
                        case 1:
                            tambahBarangHabisPakai();
                            break;
                        case 2:
                            lihatSemuaBarangHabisPakai();
                            break;
                        case 3:
                            ubahBarangHabisPakai();
                            break;
                        case 4:
                            hapusBarangHabisPakai();
                            break;
                        case 5:
                            isRunning = false;
                            break;
                        default:
                            System.out.println("Pilihan tidak valid!");
                    }
                } else {
                    System.out.println("Input tidak valid. Harap masukkan angka.");
                    scanner.nextLine();
                }
            } catch (Exception e) {
                System.out.println("Terjadi kesalahan: " + e.getMessage());
            }
        }
    }

    @Override
    public void menuBarangTidakHabisPakai() {
        boolean isRunning = true;
        while (isRunning) {
            System.out.println("========================================");
            System.out.println("----------------------------------------");
            System.out.println("Menu Stok Barang Tidak Habis Pakai:");
            System.out.println("----------------------------------------");
            System.out.println("\n1. Tambah Stok Barang");
            System.out.println("\n2. Lihat Semua Stok Barang");
            System.out.println("\n3. Ubah Stok Barang");
            System.out.println("\n4. Hapus Stok Barang");
            System.out.println("\n5. Kembali ke Menu Utama");
            System.out.println("----------------------------------------");
            System.out.println("========================================");
            System.out.print("Pilih menu: ");

            try {
                if (scanner.hasNextInt()) {
                    int choice = scanner.nextInt();
                    scanner.nextLine();

                    switch (choice) {
                        case 1:
                            tambahBarangTidakHabisPakai();
                            break;
                        case 2:
                            lihatSemuaBarangTidakHabisPakai();
                            break;
                        case 3:
                            ubahBarangTidakHabisPakai();
                            break;
                        case 4:
                            hapusBarangTidakHabisPakai();
                            break;
                        case 5:
                            isRunning = false;
                            break;
                        default:
                            System.out.println("Pilihan tidak valid!");
                    }
                } else {
                    System.out.println("Input tidak valid. Harap masukkan angka.");
                    scanner.nextLine();
                }
            } catch (Exception e) {
                System.out.println("Terjadi kesalahan: " + e.getMessage());
            }
        }
    }

    private static void tambahBarangHabisPakai() {
        System.out.print("kode Barang: ");
        try {
            if (scanner.hasNextInt()) {
                int kodeBarang = scanner.nextInt();
                scanner.nextLine();
    
                if (Barang.getKodeBarangSet().contains(kodeBarang)) {
                    System.out.println("Kode Barang sudah ada/pernah digunakan. Mohon masukkan kode yang unik.");
                    return;
                }
                System.out.print("Nama Barang: ");
                String namaBarang = scanner.nextLine();
                System.out.print("Stok Awal: ");
                if (scanner.hasNextInt()) {
                    int stokAwal = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Keterangan: ");
                    String keterangan = scanner.nextLine();
    
                    new BarangHabisPakai(kodeBarang, namaBarang, stokAwal, 0, 0, keterangan);
                    System.out.println("Stok barang habis pakai berhasil ditambahkan.");
                } else {
                    System.out.println("Input Stok Awal tidak valid. Harap masukkan angka.");
                }
            } else {
                System.out.println("Input kode Barang tidak valid. Harap masukkan angka.");
            }
        } catch (Exception e) {
            System.out.println("Terjadi kesalahan: " + e.getMessage());
        }
    }    

    private static void tambahBarangTidakHabisPakai() {
        System.out.print("kode Barang: ");
        try {
            if (scanner.hasNextInt()) {
                int kodeBarang = scanner.nextInt();
                scanner.nextLine();
    
                if (Barang.getKodeBarangSet().contains(kodeBarang)) {
                    System.out.println("Kode Barang sudah ada/pernah digunakan. Mohon masukkan kode yang unik.");
                    return;
                }
                System.out.print("Nama Barang: ");
                String namaBarang = scanner.nextLine();
                System.out.print("Stok Awal: ");
                if (scanner.hasNextInt()) {
                    int stokAwal = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Keterangan: ");
                    String keterangan = scanner.nextLine();
    
                    new BarangTidakHabisPakai(kodeBarang, namaBarang, stokAwal, 0, 0, keterangan);
                    System.out.println("Stok barang habis pakai berhasil ditambahkan.");
                } else {
                    System.out.println("Input Stok Awal tidak valid. Harap masukkan angka.");
                }
            } else {
                System.out.println("Input kode Barang tidak valid. Harap masukkan angka.");
            }
        } catch (Exception e) {
            System.out.println("Terjadi kesalahan: " + e.getMessage());
        }
    }    

    private static void lihatSemuaBarangHabisPakai() {
        ArrayList<BarangHabisPakai> BarangHabisPakaiList = new ArrayList<>(BarangHabisPakai.getBarangHabisPakaiList());
        if (BarangHabisPakaiList.isEmpty()) {
            System.out.println("Tidak ada stok barang habis pakai yang tersedia.");
            return;
        }
        System.out.println("===================================================================================================================");
        System.out.printf("| %-5s | %-10s | %-20s | %-10s | %-10s | %-10s | %-10s | %-15s |\n", "No", "kode", "Nama Barang", "Stok Awal", "Masuk", "Keluar", "Stok Akhir", "Keterangan");
        System.out.println("===================================================================================================================");
        for (BarangHabisPakai Barang : BarangHabisPakaiList) {
            System.out.printf("| %-5d | %-10d | %-20s | %-10d | %-10d | %-10d | %-10d | %-15s |\n", Barang.getNomor(), Barang.getkodeBarang(), Barang.getNamaBarang(), Barang.getStokAwal(), Barang.getBarangMasuk(), Barang.getBarangKeluar(), Barang.getStokAkhir(), Barang.getKeterangan()); 
        }
        System.out.println("===================================================================================================================");
    }

    private static void lihatSemuaBarangTidakHabisPakai() {
        ArrayList<BarangTidakHabisPakai> BarangTidakHabisPakaiList = new ArrayList<>(BarangTidakHabisPakai.getBarangTidakHabisPakaiList());
        if (BarangTidakHabisPakaiList.isEmpty()) {
            System.out.println("Tidak ada stok barang tidak habis pakai yang tersedia.");
            return;
        }
        System.out.println("===================================================================================================================");
        System.out.printf("| %-5s | %-10s | %-20s | %-10s | %-10s | %-10s | %-10s | %-15s |\n", "No", "kode", "Nama Barang", "Stok Awal", "Masuk", "Keluar", "Stok Akhir", "Keterangan");
        System.out.println("===================================================================================================================");
        for (BarangTidakHabisPakai Barang : BarangTidakHabisPakaiList) {
            System.out.printf("| %-5d | %-10d | %-20s | %-10d | %-10d | %-10d | %-10d | %-15s |\n", Barang.getNomor(), Barang.getkodeBarang(), Barang.getNamaBarang(), Barang.getStokAwal(), Barang.getBarangMasuk(), Barang.getBarangKeluar(), Barang.getStokAkhir(), Barang.getKeterangan()); 
        }
        System.out.println("===================================================================================================================");
    }

    private static void ubahBarangHabisPakai() {
        System.out.print("Masukkan kode barang yang ingin diubah: ");
        try {
            if (scanner.hasNextInt()) {
                int kodeBarang = scanner.nextInt();
                scanner.nextLine();
                ArrayList<BarangHabisPakai> BarangHabisPakaiList = new ArrayList<>(BarangHabisPakai.getBarangHabisPakaiList());
                boolean found = false;
                for (BarangHabisPakai Barang : BarangHabisPakaiList) {
                    if (Barang.getkodeBarang() == kodeBarang) { 
                        found = true;
                        System.out.println("Stok Barang Habis Pakai:");
                        System.out.println("===================================================================================================================");
                        System.out.printf("| %-5s | %-10s | %-20s | %-10s | %-10s | %-10s | %-10s | %-15s |\n", "No", "kode", "Nama Barang", "Stok Awal", "Masuk", "Keluar", "Stok Akhir", "Keterangan");
                        System.out.println("===================================================================================================================");
                        System.out.printf("| %-5d | %-10d | %-20s | %-10d | %-10d | %-10d | %-10d | %-15s |\n", Barang.getNomor(), Barang.getkodeBarang(), Barang.getNamaBarang(), Barang.getStokAwal(), Barang.getBarangMasuk(), Barang.getBarangKeluar(), Barang.getStokAkhir(), Barang.getKeterangan()); 
                        System.out.println("===================================================================================================================");
                        System.out.print("Stok Masuk: ");
                        if (scanner.hasNextInt()) {
                            int barangMasuk = scanner.nextInt();
                            scanner.nextLine();
                            System.out.print("Stok Keluar: ");
                            if (scanner.hasNextInt()) {
                                int barangKeluar = scanner.nextInt();
                                scanner.nextLine();
                                System.out.print("Keterangan: ");
                                String keterangan = scanner.nextLine();

                                Barang.setBarangMasuk(barangMasuk);
                                Barang.setBarangKeluar(barangKeluar);
                                Barang.setStokAkhir(Barang.getStokAwal() + barangMasuk - barangKeluar);
                                Barang.setKeterangan(keterangan);
                                System.out.println("Stok barang berhasil diubah.");
                            } else {
                                System.out.println("Input Stok Keluar tidak valid. Harap masukkan angka.");
                            }
                        } else {
                            System.out.println("Input Stok Masuk tidak valid. Harap masukkan angka.");
                        }
                        break;
                    }
                }
                if (!found) {
                    System.out.println("kode barang tidak ditemukan.");
                }
            } else {
                System.out.println("Input kode barang tidak valid. Harap masukkan angka.");
            }
        } catch (Exception e) {
            System.out.println("Terjadi kesalahan: " + e.getMessage());
        }
    }
    
    private static void ubahBarangTidakHabisPakai() {
        System.out.print("Masukkan kode barang yang ingin diubah: ");
        try {
            if (scanner.hasNextInt()) {
                int kodeBarang = scanner.nextInt();
                scanner.nextLine();
                ArrayList<BarangTidakHabisPakai> BarangTidakHabisPakaiList = new ArrayList<>(BarangTidakHabisPakai.getBarangTidakHabisPakaiList());
                boolean found = false;
                for (BarangTidakHabisPakai Barang : BarangTidakHabisPakaiList) {
                    if (Barang.getkodeBarang() == kodeBarang) { 
                        found = true;
                        System.out.println("Stok Barang Tidak Habis Pakai:");
                        System.out.println("===================================================================================================================");
                        System.out.printf("| %-5s | %-10s | %-20s | %-10s | %-10s | %-10s | %-10s | %-15s |\n", "No", "kode", "Nama Barang", "Stok Awal", "Masuk", "Keluar", "Stok Akhir", "Keterangan");
                        System.out.println("===================================================================================================================");
                        System.out.printf("| %-5d | %-10d | %-20s | %-10d | %-10d | %-10d | %-10d | %-15s |\n", Barang.getNomor(), Barang.getkodeBarang(), Barang.getNamaBarang(), Barang.getStokAwal(), Barang.getBarangMasuk(), Barang.getBarangKeluar(), Barang.getStokAkhir(), Barang.getKeterangan()); 
                        System.out.println("===================================================================================================================");
                        System.out.print("Stok Masuk: ");
                        if (scanner.hasNextInt()) {
                            int barangMasuk = scanner.nextInt();
                            scanner.nextLine();
                            System.out.print("Stok Keluar: ");
                            if (scanner.hasNextInt()) {
                                int barangKeluar = scanner.nextInt();
                                scanner.nextLine();
                                System.out.print("Keterangan: ");
                                String keterangan = scanner.nextLine();

                                Barang.setBarangMasuk(barangMasuk);
                                Barang.setBarangKeluar(barangKeluar);
                                Barang.setStokAkhir(Barang.getStokAwal() + barangMasuk - barangKeluar);
                                Barang.setKeterangan(keterangan);
                                System.out.println("Stok barang berhasil diubah.");
                            } else {
                                System.out.println("Input Stok Keluar tidak valid. Harap masukkan angka.");
                            }
                        } else {
                            System.out.println("Input Stok Masuk tidak valid. Harap masukkan angka.");
                        }
                        break;
                    }
                }
                if (!found) {
                    System.out.println("kode barang tidak ditemukan.");
                }
            } else {
                System.out.println("Input kode barang tidak valid. Harap masukkan angka.");
            }
        } catch (Exception e) {
            System.out.println("Terjadi kesalahan: " + e.getMessage());
        }
    }

    private static void hapusBarangHabisPakai() {
        System.out.print("Masukkan kode barang yang ingin dihapus: ");
        try {
            if (scanner.hasNextInt()) {
                int kodeBarang = scanner.nextInt();
                scanner.nextLine();
                BarangHabisPakai barangToDelete = null;
                for (BarangHabisPakai barang : BarangHabisPakai.getBarangHabisPakaiList()) {
                    if (barang.getkodeBarang() == kodeBarang) {
                        barangToDelete = barang;
                        break;
                    }
                }
                if (barangToDelete != null) {
                    BarangHabisPakai.getBarangHabisPakaiList().remove(barangToDelete);
                    System.out.println("Barang habis pakai berhasil dihapus.");
                } else {
                    System.out.println("Kode barang tidak ditemukan.");
                }
            } else {
                System.out.println("Input kode barang tidak valid. Harap masukkan angka.");
            }
        } catch (Exception e) {
            System.out.println("Terjadi kesalahan: " + e.getMessage());
        }
    }
    
    private static void hapusBarangTidakHabisPakai() {
        System.out.print("Masukkan kode barang yang ingin dihapus: ");
        try {
            if (scanner.hasNextInt()) {
                int kodeBarang = scanner.nextInt();
                scanner.nextLine();
                BarangTidakHabisPakai barangToDelete = null;
                for (BarangTidakHabisPakai barang : BarangTidakHabisPakai.getBarangTidakHabisPakaiList()) {
                    if (barang.getkodeBarang() == kodeBarang) {
                        barangToDelete = barang;
                        break;
                    }
                }
                if (barangToDelete != null) {
                    BarangTidakHabisPakai.getBarangTidakHabisPakaiList().remove(barangToDelete);
                    System.out.println("Barang tidak habis pakai berhasil dihapus.");
                } else {
                    System.out.println("Kode barang tidak ditemukan.");
                }
            } else {
                System.out.println("Input kode barang tidak valid. Harap masukkan angka.");
            }
        } catch (Exception e) {
            System.out.println("Terjadi kesalahan: " + e.getMessage());
        }
    }        

    @Override
    public void lihatSemuaBarang() {
        System.out.println("===================================================================================================================");
        System.out.println("                                               BARANG HABIS PAKAI                                                  ");
        System.out.println("===================================================================================================================");
        lihatSemuaBarangHabisPakai();
        System.out.println("===================================================================================================================");
        System.out.println("                                            BARANG TIDAK HABIS PAKAI                                               ");
        System.out.println("===================================================================================================================");
        lihatSemuaBarangTidakHabisPakai();
    }

}
